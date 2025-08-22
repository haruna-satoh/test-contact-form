<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Contact::class;

    public function definition()
    {
        $faker = \Faker\Factory::create('ja_JP');
        $faker->unique(true);

        return [
            'category_id' => $faker->numberBetween(1, 5),
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'gender' => $faker->randomElement([1, 2, 3]),
            'email' => $faker->safeEmail,
            'tel' => $faker->numerify('080-####-####'),
            'address' => $faker->address,
            'building' => $faker->optional()->word,
            'detail' => $faker->text(50),
        ];
    }
}
