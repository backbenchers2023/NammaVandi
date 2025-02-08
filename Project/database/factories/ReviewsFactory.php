<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reviews>
 */
class ReviewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Reviews::class;

    public function definition()
    {
        $names = ['Arun Kumar', 'Priya Shankar', 'Vignesh Raj', 'Deepa Natarajan', 'Karthik Subramaniam', 'Meena Ramesh', 'Suresh Iyer', 'Anitha Mohan', 'Ravi Chandran', 'Lakshmi Narayanan'];
        $locations = ['Avinashi', 'Udumalpet', 'Palladam', 'Dharapuram', 'Kangeyam', 'Pollachi', 'Tiruppur', 'Vellakoil', 'Koduvai', 'Muthur'];
        $thoughts = [
            'The car’s mileage is exceptional and very budget-friendly for long drives.',
            'Comfortable seating and ample storage space, perfect for family trips.',
            'Smooth driving experience and good performance even on rough roads.',
            'Highly recommend this car for its modern design and fuel efficiency.',
            'A great choice for city commutes and occasional long drives.',
            'Impressed with the advanced features and safety measures.',
            'Affordable maintenance costs make it a practical option.',
            'Stylish exterior and comfortable interior – a good combination.',
            'The car’s handling and braking system are quite reliable.',
            'Decent performance with excellent air conditioning and audio system.'
        ];

        return [
            'name' => $this->faker->randomElement($names),
            'location' => $this->faker->randomElement($locations),
            'thoughts' => $this->faker->randomElement($thoughts),
            'ratings' => 5,
        ];
    }
}
