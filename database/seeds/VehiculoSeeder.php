<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Vehiculo;
use App\Fabricante;
class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker::create();
        
                $cantidad = Fabricante::all()->count();
        
        
            for($i= 0; $i < 50;$i++){
        Vehiculo::create([
        'color' => $faker->safeColorName(),
        'cilindraje' => $faker->randomFloat(1,0,20),
        'potencia' => $faker->randomNumber(),
        'peso' => $faker->randomFloat(1,0,20),
        'fabricante_id' => $faker->numberBetween(1,$cantidad)
        ]);
            }

    }
}
