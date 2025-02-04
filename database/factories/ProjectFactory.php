<?php

namespace Database\Factories;

use App\Enum\ProjectStatus;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->text(),
            'status' => $this->faker->randomElement(array_column(ProjectStatus::cases(), 'value')),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
