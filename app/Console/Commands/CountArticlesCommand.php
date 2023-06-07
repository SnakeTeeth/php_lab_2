<?php

namespace App\Console\Commands;
use App\Models\Tag;
use Illuminate\Console\Command;

class CountArticlesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     *
     */
    protected $signature = 'articles:count {id}';

    protected $description = 'Кол-во статей привязанных к тегу';

    public function handle()
    {
        $tagId = $this->argument('id');

        $tag = Tag::find($tagId);

        if (!$tag) {
            throw new \InvalidArgumentException("Tag with ID {$tagId} not found.");
        }

        $articleCount = $tag->articles()->count();

        $this->info("Number of articles attached to tag with ID {$tagId}: {$articleCount}");
    }
}
