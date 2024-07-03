<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Notizia;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notizia>
 */
class NotiziaFactory extends Factory
{
    protected $model = Notizia::class;
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
        $imageDirectory = public_path('img/notizie');
        $randomImage = str_replace(public_path(), '', $this->getRandomImageFromDirectory($imageDirectory));

            return [
                'titolo' => $this->faker->sentence(),
                'testo' => $this->faker->text(1000),
                'data' => $this->faker->date(),
                'foto' => basename($randomImage),
            ];
        }
        
}
