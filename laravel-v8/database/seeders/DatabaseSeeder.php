<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $users = ['John Doe', 'Victor', 'James Moriarty'];

        // for ($i = 0; $i < count($users); $i++) {
        //     User::create([
        //         'name' => $users[$i],
        //         'email' => str_replace(" ", "", strtolower($users[$i])) . '@gmail.com',
        //         'password' => bcrypt('secret')
        //     ]);
        // }
        User::create([
            'name' => 'John Doe',
            'username' => 'john.doe',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('secret')
        ]);

        User::factory(5)->create();
        Post::factory(50)->create();

        $this->call([
            CategorySeeder::class,
            //     PostSeeder::class,
        ]);
    }
}
