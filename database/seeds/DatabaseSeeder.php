<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('admins')->insert([
            'created_at' => $now,
            'updated_at' => $now,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'job_title' => 'ADMIN',
            'password' => bcrypt('admin123'),
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
