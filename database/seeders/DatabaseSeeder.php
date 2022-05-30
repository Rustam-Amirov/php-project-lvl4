<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TaskStatus;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_statuses')->truncate();
        DB::table('task_statuses')->insert([
            ['id' => 1, 'name' => TaskStatus::$defaultTaskStatuses[1]],
            ['id' => 2, 'name' => TaskStatus::$defaultTaskStatuses[2]],
            ['id' => 3, 'name' => TaskStatus::$defaultTaskStatuses[3]],
            ['id' => 4, 'name' => TaskStatus::$defaultTaskStatuses[4]],
        ]);
    }
}
