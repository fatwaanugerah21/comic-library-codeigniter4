<?php namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class KomikSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
                $faker = \Faker\Factory::create('id_ID');
                for ($i=0; $i < 10; $i++) { 
                $title = $faker->domainName;
                $slug = url_title($title, "-", True);
                $data = [
                        'judul' => $title,
                        'penulis' => $faker->name,
                        'slug' => $slug,
                        'penerbit' => $faker->company,
                        'sampul' => "Logo_UH.png",
                        'created_at' => Time::createFromTimestamp($faker->unixTime()),
                        'updated_at' => Time::now()
                ];
                
                $this->db->table('komik')->insert($data);
                }

                // Simple Queries
                /* $this->db->query("INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)",
                        $data
                ); */

                // Using Query Builder
        }
}