<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    protected $model = Contact::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence,
            'descripcion' => $this->faker->paragraph,
            'completado' => $this->faker->randomElement([0, 1])


            'id_user',
            'name',
            'email',
            'second_email',
            'phone',
            'second_phone',
            'country',
            'state',
            'address',
            'city',
            'postal_code',
            'id_origins',
            'id_type',
            'id_level',
            'image',
        ];
    }
}
