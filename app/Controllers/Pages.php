<?php namespace App\Controllers;


class Pages extends BaseController
{

	public function index()
	{
        $data = [
            'title' => 'Home | Appseminar'
        ];
        return view('pages/home',$data);
    }
    
    public function about(){

        $data = [
            'title' => 'About Me | Appseminar'
        ];

        return view('pages/about',$data);

        
    }

    public function contact() {

        $data = [
            'title' => 'Contact Us | Appseminar',
            'alamat'=> [
                [
                    'tipe' => 'Rumah',
                    'alamat'=> ' NTI Blok T No 23',
                    'kota' => 'Makassar'

                ],
                [
                    'tipe' => 'Kantor',
                    'alamat'=> ' Departemen Matematika FMIPA Unhas, Kampus Tamalanrea',
                    'kota' => 'Makassar'
                ]
            ]
        ];

        return view('pages/contact',$data);
        
    }
}