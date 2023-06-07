<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tag;

class ArticleTagSeeder extends Seeder
{
    public function run()
    {

        $articles = Article::all();
        $tags = Tag::all();


        foreach ($articles as $article) {
            $randomTagIds = $tags->random(rand(1, 3))->pluck('id')->toArray();

            $article->tags()->sync($randomTagIds);
        }
    }
}
