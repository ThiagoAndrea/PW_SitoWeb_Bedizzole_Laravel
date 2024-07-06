<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Prodotto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prodotto>
 */
class ProdottoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Prodotto::class;
     public function getRandomImageFromDirectory($directory)
     {
         $files = glob($directory . '/*.*');
         return $files[array_rand($files)];
     } 
    public function definition()
    {
        $imageDirectory = public_path('img/shop');
        $randomImage = str_replace(public_path(), '', $this->getRandomImageFromDirectory($imageDirectory));
        return [
            'descrizione' => $this->faker->sentence(rand(1, 5), true),
            'prezzo' => $this->faker->randomFloat(2, 5, 40),
            'foto' => basename($randomImage),
            ];
    }
}
