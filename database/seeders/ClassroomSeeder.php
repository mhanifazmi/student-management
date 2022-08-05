<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ranges = range('A', 'Z');

        foreach ($ranges as $key => $range) {
            Classroom::updateOrCreate([
                'name' => 'Class ' . $range,
            ], [
                'name' => 'Class ' . $range,
            ]);
        }
    }
}
