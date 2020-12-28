<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categorias')->insert(
            array(
                'nombre'=> "PHP",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            )
        );
        \DB::table('categorias')->insert(
            array(
                'nombre'=> "Laravel",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            )
        );
        \DB::table('categorias')->insert(
            array(
                'nombre'=> "Angular",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            )
        );
        \DB::table('categorias')->insert(
            array(
                'nombre'=> "Material Design",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            )
        );
    }
}
