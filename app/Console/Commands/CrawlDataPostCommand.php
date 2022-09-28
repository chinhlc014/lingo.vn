<?php

namespace App\Console\Commands;

use App\Services\Crawl\CrawlPostService;
use Illuminate\Console\Command;
use Log;

class CrawlDataPostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:post_detail';

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
     * @return int
     */
    public function handle()
    {
        Log::info('Start run crawl:post_detail!');

        $service = app()->make(CrawlPostService::class);
        $service->crawlPosts();

        Log::info('End run crawl:post_detail!');
    }
}
