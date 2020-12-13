<?php namespace App\Controllers;


use App\Models\ModelKomik;

class Komik extends BaseController
{

    protected $comicModel;
    function __construct() {
        $this->comicModel = new ModelKomik();
    }


    public function index(){
        $current_page = $this->request->getVar('page_komik') ?? 1;
        $keyword = $this->request->getVar('keyword');
        
        $comic = $keyword ? $this->comicModel->search($keyword) : $this->comicModel;

        $data = [
            'title' => 'Komik | Appseminar',
            'comics' => $comic->paginate(5, "komik"),
            'pager' => $this->comicModel->pager,
            'currentPage'=> $current_page
        ];
        return view('pages/komik',$data);
    }

    public function detail($slug) {
        $comic = $this->comicModel->getKomik($slug);
        $data = [
            "title" => "Detail",
            "comic" => $comic,
            ];
        
        if (empty($data["comic"])) {
            return redirect()->to("/");
        }    
        return view('pages/detail', $data);
    }

    public function create() {
      $data = [
            'title' => 'Tambah Komik | Appseminar',
            'validation' => \Config\Services::validation()
      ];
      
      return view("pages\create", $data);
    }

    public function save() {
        if (!$this->validate([
            'title' => [
                "rules" => 'required|is_unique[komik.judul]',
                'errors' => [
                    "required" => "{field} komik harus di isi",
                    "is_unique" => "{field} komik sudah terdaftar"
                ]
            ],
             'writer' => [
                "rules" => "required",
                'errors' => [
                    "required" => "{field} komik harus di isi"
                ],
            ],
            'publisher' => [
                "rules" => "required",
                'errors' => [
                    "required" => "{field} komik harus di isi"
                ],
            ], 
            'sampul' => [
                "rules" => "max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/png,image/jpg,image/jpeg]"
            ]
            ])
            
        ) {
            return redirect()->to("/Komik/create")->withInput(); 
        }
        
        $cover = $this->request->getFile('sampul');

        if ($cover->getError() == 4) {
            $coverName = "Logo_UH.png";
        }else {
            $randomName =$cover->getRandomName();
            $cover->move("images", $randomName);
            $coverName = $cover->getName();
        }
        $comic = $this->request->getVar();
        if ($comic) {
            $slug = url_title($comic["title"], "-", true);
            $this->comicModel->save([
                'judul' => $comic["title"],
                'slug' => $slug,
                'penulis' => $comic["writer"],
                'penerbit' => $comic["publisher"],
                'sampul' => $coverName
            ]);
            $sessionData = "{$comic['title']} Berhasil ditambahkan";
            session()->setFlashData("pesan", $sessionData);
        }

        return redirect()->to("/Komik");
    }

    public function delete($id) {
        $comic = $this->comicModel->find($id);

        if ($comic["sampul"] != "Logo_UH.png") {
            unlink("images/" . $comic["sampul"]);
        }
        $this->comicModel->delete($id);
        $sessionData = "{$comic["judul"]} Berhasil didelete";
        session()->setFlashData("pesan",$sessionData);
        return redirect()->to("/komik");
    }

    public function edit($slug) {
        session();
        $komik = $this->comicModel->getKomik($slug);
        $validation = \Config\Services::validation();

        $data = [
            "title" => "Edit Komik",
            "komik" => $komik,
            'validation' => $validation
        ];
        return view("pages/edit", $data);
    }

    public function update($id) {
        $oldComic=$this->comicModel->getKomik($this->request->getVar('slug'));

        $title_rule = 'required|is_unique[komik.judul]';
        if ($oldComic["judul"] == $this->request->getVar('title')) {
            $title_rule = "required";
        }
        if (!$this->validate([
            'title' => [
                "rules" => $title_rule,
                'errors' => [
                    "required" => "{field} komik harus di isi",
                    "is_unique" => "{field} komik sudah terdaftar"
                ]
            ],
             'writer' => [
                "rules" => "required",
                'errors' => [
                    "required" => "{field} komik harus di isi"
                ],
            ],
            'publisher' => [
                "rules" => "required",
                'errors' => [
                    "required" => "{field} komik harus di isi"
                ],
            ], 
            'sampul' =>  "max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/png,image/jpg,image/jpeg]"
            ])
        ) {
            return redirect()->to("/Komik/edit/{$this->request->getVar('slug')}")->withInput(); 
        }
        $cover = $this->request->getFile('sampul');
        $oldSampul = $this->request->getVar("oldCover");
        if (!$cover->getError() == 4) {
            $randomName =$cover->getRandomName();
            $cover->move("images/", $randomName);
            $coverName = $cover->getName();
            if ($oldSampul != "Logo_UH.png") {
                unlink("images/" . $oldSampul);
            }
        }
        
        $comic = $this->request->getVar();
        if ($comic) {
            $slug = url_title($comic["title"], "-", true);
            $this->comicModel->save([
                'id' => $id,
                'judul' => $comic["title"],
                'slug' => $slug,
                'penulis' => $comic["writer"],
                'penerbit' => $comic["publisher"],
                'sampul' => $coverName ?? $oldSampul
            ]);
            $sessionData = "{$comic['title']} berhasil diubah";
            session()->setFlashData("pesan", $sessionData);
        }

        return redirect()->to("/Komik");
    } 

}