<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionImgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\QuestionImg::factory()->create([
            'question' => 'Donald Trump has a snowman as a pet!',
            'correct' => '0',
            'realNew' => 'He has no a snowman as a pet',
            'img' => '',
        ]);
    }
}
