<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->sentence(mt_rand(4,8)),
            'user_id'=>(mt_rand(1,5)),
            'kategori_id'=>(mt_rand(1,5)),
            'file_upload'=>'img_default.jpg',
            'excerpt'=>fake()->paragraph(mt_rand(6,8)),
            'body'=>fake()->paragraph(mt_rand(8,12)),
        ];
    }
}
