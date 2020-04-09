<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('guilds')->insert([
            'name' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'role' => 'user',
            'mobile' => '09156583780',
            'email' => Str::random(10)
        ]);
        DB::table('members')->insert([
            'user_id' => 1,
            'fatherName' => 'femofmeo',
            'city_id' => 1,

        ]);


        DB::table('servants')->insert([
            'shaba' => Str::random(10),
            'user_id' => 1,
            'city_id' => 1,

        ]);
        DB::table('restaurants')->insert([
            'name' => Str::random(10),
            'slug' => Str::random(10),
            'title' => Str::random(10),
            'description' => Str::random(10),
            'designerComment' => Str::random(10),
            'address' => Str::random(10),
            'phone' => Str::random(10),
            'location' => Str::random(10),
            'guild_id' => 1,
            'city_id' => 1,
            'servant_id' => 1,
        ]);
        DB::table('pages')->insert([
            'name' => Str::random(10),
            'title' => Str::random(10),
            'link' => Str::random(10),
            'description' => Str::random(10),
        ]);


        DB::table('comments')->insert([
            'name' => Str::random(10),
            'body' => Str::random(10),
            'commentable_id' => 1,
            'commentable_type' => 'App\Models\Restaurant',
        ]);

//        $users = factory(App\Models\City::class, 3)->make();
        // $this->call(UsersTableSeeder::class);
    }
}
