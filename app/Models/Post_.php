<?php

namespace App\Models;


class Post 
{
    private static $blog_posts = [
    [
        "title" => "Judul Post Pertama",
        "slug" => "judul-post-pertama",
        "author" => "Marvin Luckyanto",
        "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat nobis ipsum, ratione et, non quas delectus consequatur impedit quasi iusto id repellendus. Laudantium enim nostrum atque, in corporis ea, repudiandae fugit iure repellendus magni quos blanditiis quasi doloremque doloribus molestiae? Distinctio, doloribus unde. Ratione assumenda quae dicta a itaque praesentium nemo quidem voluptatibus? Aspernatur delectus ab laborum libero similique totam dolorum earum natus enim culpa accusamus eaque, ut, quasi laboriosam est porro velit, dignissimos architecto tempore voluptatibus? Consequatur, officia dignissimos."
    ],
    [
        "title" => "Judul Post Kedua",
        "slug" => "judul-post-kedua",
        "author" => "Jamet Jameludin",
        "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates facilis corporis deserunt commodi ratione, itaque excepturi mollitia earum consectetur voluptas odio tenetur nemo. Ab non corrupti tenetur ullam in maiores adipisci beatae hic dolor molestias, accusamus dolorem eveniet, deserunt praesentium. Incidunt aliquid quis velit sequi deleniti quidem doloremque accusamus, alias quibusdam, odio numquam at illum error dicta iste necessitatibus inventore, voluptatem atque eius cum libero ab? Accusamus, voluptates minus! Temporibus blanditiis nemo voluptates non similique nostrum voluptate dolorem placeat beatae exercitationem! Delectus aspernatur enim molestias pariatur sapiente dolores incidunt iste facere, sit, quo omnis. Natus blanditiis assumenda debitis fugiat maxime?"
    ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
