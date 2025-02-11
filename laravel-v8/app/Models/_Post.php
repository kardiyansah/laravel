<?php

namespace App\Models;

class Post
{
    private static $posts = [
        [
            'title' => 'First title',
            'slug' => 'first-title',
            'author' => 'John Doe',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi nostrum debitis aliquam quam nam facere, odio sit aperiam voluptates error nulla eveniet cumque, aut porro! Temporibus aperiam eius architecto fuga ipsam ipsa impedit reiciendis, voluptatibus praesentium. Consequuntur, libero fugiat. Voluptas possimus nobis ratione explicabo dicta inventore odio quaerat iure labore natus eaque, adipisci minus! Debitis, praesentium ea. Qui cupiditate aut laboriosam commodi quas quibusdam nobis omnis error ducimus molestias, placeat suscipit eius voluptatum? Architecto doloribus, asperiores quibusdam perspiciatis unde quis.'
        ],
        [
            'title' => 'Second title',
            'slug' => 'second-title',
            'author' => 'Victor',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi nostrum debitis aliquam quam nam facere, odio sit aperiam voluptates error nulla eveniet cumque, aut porro! Temporibus aperiam eius architecto fuga ipsam ipsa impedit reiciendis, voluptatibus praesentium. Consequuntur, libero fugiat. Voluptas possimus nesentium ea. Qui cupiditate aut laboriosam commodi quas quibusdam nobis omnis error ducimus molestias, placeat suscipit eius voluptatum? Architecto doloribus, asperiores quibusdam perspiciatis unde quis.'
        ],
        [
            'title' => 'Third title',
            'slug' => 'third-title',
            'author' => 'Alexander',
            'body' => 'Lorem ipsum voluptates error nulla eveniet cumque, aut porro! Temporibus aperiam eius architecto fuga ipsam ipsa impedit reiciendis, voluptatibus praesentium. Consequuntur, libero fugiat. Voluptas possimus nesentium ea. Qui cupiditate aut laboriosam commodi quas quibusdam nobis omnis error ducimus molestias, placeat suscipit eius voluptatum? Architecto doloribus, asperiores quibusdam perspiciatis unde quis.'
        ]
    ];

    public static function all()
    {
        return collect(self::$posts);
    }

    public static function find($slug)
    {
        $posts = static::all();

        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p["slug"] === $slug) $post = $p;
        // }

        return $posts->firstWhere('slug', $slug);
    }
}
