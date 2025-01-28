<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mensaje;
class MensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(0, 10) as $mensaje) {

            if($mensaje%3!=0){
                Mensaje::create([
                    'grupo_id' => rand(2,3),
                    'user_id' => rand(1,2),
                    'texto' => "Hola soy el mensaje nº ".$mensaje
                ]);
            }
        }
    }
}
