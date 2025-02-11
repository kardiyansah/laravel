<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $posts_title = ['The First Title', 'The Second Title', 'The Third Title'];
        $categories_id = [1, 2, 1];
        $users_id = [1, 2, 3];

        for ($i = 0; $i < count($posts_title); $i++) {
            Post::create([
                'title' => $posts_title[$i],
                'category_id' => $categories_id[$i],
                'user_id' => $users_id[$i],
                'slug' => Str::slug($posts_title[$i], '-'),
                'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus minima harum ipsam voluptatibus voluptate porro veritatis a placeat recusandae! At ab minus ipsa provident cum.',
                'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae ipsum doloremque eius? Adipisci quam expedita illo voluptatem eveniet natus eius possimus velit, recusandae officia vel non sapiente, dicta ut iure alias beatae, est eum! Culpa ad perferendis consequatur ex minus et quidem vero nesciunt possimus ab sunt aliquid modi illo illum reiciendis id, impedit consectetur placeat maiores tempora. Ad beatae deleniti in veritatis! Unde tenetur quasi, odit error beatae, quis totam placeat qui eligendi nesciunt dolore aliquid fugiat adipisci natus accusamus similique quia alias soluta vitae. Explicabo maiores consequuntur, sint incidunt similique atque sapiente asperiores iure reprehenderit maxime consequatur earum.'
            ]);
        }
    }
}
