<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Schedule::class;
    protected $day = ["Monday","Tuesday", "Wednesday", "Thurstday", "Friday", "Saturday", "Sunday"];
    public function definition(): array
    {
        return [
            "shift" => fake()->boolean(50),
            "schedule_day" => fake()->randomElement($this->day),
        ];
    }
}
