<?php namespace App\Models;

use CodeIgniter\Model;

class ModelKomik extends Model
{
  // protected $DBGroup = "codeigniter";
  protected $table = "komik";
  protected $useTimestamps = true;
  protected $allowedFields = ["judul", "penulis", 'penerbit', 'slug', 'sampul'];

  public function getKomik($slug = false) {
    return $slug ? $this->where(['slug'=>$slug])->first() : $this->findAll() ;
  }

  public function search($keyword) {
    return $this->table('komik')->like('judul', $keyword)->orLike('penulis', $keyword)->orLike('penerbit', $keyword);
  }
}