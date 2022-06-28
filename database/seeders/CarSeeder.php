<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Database\Factories\CarFactory;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('cars')->insert([
        //     'make' => Str::random(10),
        //     'model' => Str::random(10),
        //     'produced_on' => Carbon::parse('01-02-2022'),
        // ]);
        Car::factory()->count(10)->create();
    }
}
