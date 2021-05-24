<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_book' =>$this->faker->text(20),
            'name_book'  =>$this->faker->text(20),
            'author'  =>$this->faker->text(20),
            'description'  =>$this->faker->text(100),
            'langue'  =>$this->faker->text(20),
            'edition'  =>$this->faker->text(20),
            'user_update'  =>$this->faker->text(20),
            'id_type' =>$this->faker->integer(20),
        ];
    }
}
