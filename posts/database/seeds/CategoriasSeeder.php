<?php

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
                'nombre'=> "Lenguajes de programacion",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => now(),
            )
        );
        \DB::table('categorias')->insert(
            array(
                'nombre'=> "Programación Movil",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => now(),
            )
        );
        \DB::table('categorias')->insert(
            array(
                'nombre'=> "Experiencia de Usuario",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => now(),
            )
        );
    }
}
