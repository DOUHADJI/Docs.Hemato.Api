<?php

namespace Database\Seeders;

use App\Models\Step;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $steps = ["Pré-analytique", "analytique", "Post-analytique"];

        foreach($steps as $step)
        {
            $model = new Step();
            $model->name = $step;
            $model->slug = Str::slug($step);
            $model->save();
        }
    }
}
