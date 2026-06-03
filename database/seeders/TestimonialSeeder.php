<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Ludovic M.',
                'stars' => 4,
                'comment' => 'Cadre très agréable, les plats sont délicieux, et service de qualité.',
                'avatar_letter' => 'L',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'client_name' => 'Marie-France N.',
                'stars' => 5,
                'comment' => 'Vue imprenable et ambiance joyeuse. Une adresse à recommander sans hésitation.',
                'avatar_letter' => 'M',
                'sort_order' => 2,
                'is_active' => true
            ],
            [
                'client_name' => 'Sophie L.',
                'stars' => 5,
                'comment' => 'Un cadre exceptionnel face à la Maine et un personnel très agréable.',
                'avatar_letter' => 'S',
                'sort_order' => 3,
                'is_active' => true
            ]
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
