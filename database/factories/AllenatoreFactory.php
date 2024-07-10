<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Allenatore;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Allenatore>
 */
class AllenatoreFactory extends Factory
{
    protected $model = Allenatore::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     public function getRandomImageFromDirectory($directory)
    {
        $files = glob($directory . '/*.*');
        return $files[array_rand($files)];
    }  
    public function definition()
    {
        $imageDirectory = public_path('img/allenatori');
        $randomImage = str_replace(public_path(), '', $this->getRandomImageFromDirectory($imageDirectory));
        
        return [
            'nome' => $this->faker->firstName(),
            'cognome' => $this->faker->lastName(),
            'data_di_nascita' => $this->faker->date(),
            'foto' => basename($randomImage),

        ];
    }
}
