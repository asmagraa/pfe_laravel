<?php

namespace Database\Factories;

use App\Models\Book_ocr;
use Illuminate\Database\Eloquent\Factories\Factory;

class Book_ocrFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book_ocr::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'page' =>$this->faker->text(20),
            'file'  =>$this->faker->text(20),
            'id_book'  =>$this->faker->text(20)
        ];
    }
}
