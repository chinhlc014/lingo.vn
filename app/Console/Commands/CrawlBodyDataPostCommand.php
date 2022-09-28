<?php

namespace App\Console\Commands;

use App\Services\Crawl\CrawlPostService;
use Illuminate\Console\Command;
use Log;

/**
 * Class CrawlBodyDataPostCommand
 *
 * @package App\Console\Commands
 */
class CrawlBodyDataPostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:post_body_detail';

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
        Log::info('Start run crawl:post_body_detail!');

        $service = app()->make(CrawlPostService::class);
        $service->crawlBodyPostDetails();

        Log::info('End run crawl:post_body_detail!');
    }
}
