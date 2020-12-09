<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // chạy : php artisan db:seed
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
    }

}
class UserSeeder extends  Seeder{
    public function run(){
        DB::table('user')->insert([
            ['name'=>'son', 'age'=> '3', 'password'=>bcrypt('')],
            [],
            []

        ]);
    }
}
