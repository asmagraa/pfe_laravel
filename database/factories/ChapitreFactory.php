<?php

namespace Database\Factories;

use App\Models\Chapitre;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChapitreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chapitre::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_chapitre' =>$this->faker->text(20),
            'name_chapitre'  =>$this->faker->text(20),
            'text'  =>$this->faker->text(100),
            'num_chapitre'  =>$this->faker->integer(20),
            'file_id' =>$this->faker->integer(20),
            'num_box'  =>$this->faker->integer(20),
            'id_book' =>$this->faker->integer(20),
            'file_id' =>$this->faker->integer(20)
        ];
    }
}
