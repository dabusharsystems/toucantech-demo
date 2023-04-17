<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Member;
use App\Models\School;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {

        // Initialize Faker library
        $faker = Faker::create();

        // Create 10 schools
        for ($i = 1; $i <= 10; $i++) {
            DB::table('schools')->insert([
                'name' => $faker->company,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        $schools = School::pluck('id')->toArray();

        // Create 50 members and associate them with 1-5 schools each

        for ($i = 1; $i <= 20; $i++) {
            DB::table('members')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'school_id' => $faker->randomElement($schools),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Choose a random number of schools to associate the member with
            $num_schools = rand(1, 3);

            // Choose random schools and associate them with the member
            $school_ids = DB::table('schools')->select('id')->inRandomOrder()->limit($num_schools)->get()->pluck('id');
            foreach ($school_ids as $school_id) {
                DB::table('member_school')->insert([
                    'member_id' => $i,
                    'school_id' => $school_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
