<?php

namespace App\Console\Commands;

use App\Models\Local\CrawlPost;
use App\Models\Reviewer;
use Illuminate\Console\Command;
use Log;

/**
 * Class PublishedPostCommand
 *
 * @package App\Console\Commands
 */
class PublishedPostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'published_post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        Log::info('Start run published_post!');

        $crawlPosts = CrawlPost::crawlDone()->orderBy('id', 'asc')->limit(1)->get();
        foreach ($crawlPosts as $crawlPost) {
            $crawlPost->status = config('constant.crawl_post.status.production');
            $crawlPost->save();
            $this->checkAndSetReviewer($crawlPost);
        }

        Log::info('End run published_post!');
    }

    /**
     * function description
     *
     * @param $post
     * @return null
     */
    public function checkAndSetReviewer($post)
    {
        $reviewer = $post->reviewer;
        if (!$reviewer) {
            $reviewers = Reviewer::where('site_identifier', config('constant.site_identifier'))->get();
            if (count($reviewers)) {
                $reviewerTemp = $reviewers->random(1)->first();
                $post->reviewer_id = $reviewerTemp->id;
                $post->save();

                $reviewer = $reviewerTemp;
            }
        }
        return $reviewer;
    }
}
