<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition()
    {
        $schools = School::pluck('id')->toArray();

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'school_id' => $this->faker->randomElement($schools),
        ];
    }
}
