<?php

namespace Tests\Browser;

use App\Models\Local\CrawlKeyword;
use App\Models\Local\CrawlPost;
use App\Models\Local\CrawlPostDetail;
use App\Support\WebHelpers;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Symfony\Component\DomCrawler\Crawler;
use Tests\DuskTestCase;

/**
 * Class CrawlPostTest
 *
 * @package Tests\Browser
 */
class CrawlPostTest extends DuskTestCase
{

    protected $blockDomains = [
        'shopee.vn',
        'iprice.vn',
        'facebook.com',
        'youtube.com',
        'twitter.com',
        'google.com',
        'instagram.com',
    ];

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $keywords = CrawlKeyword::where('status', config('constant.crawl_keyword.status.new'))->limit(2)->get();

        foreach ($keywords as $keyword) {
            $post = $this->checkAndCreateNewPost($keyword);

            try {
                $this->browse(function (Browser $browser) use ($keyword, $post) {
                    $this->crawlDataGoogle($browser, $keyword, $post);
                });

                $this->browse(function (Browser $browser) use ($keyword, $post) {
                    $this->crawlDataGoogle($browser, $keyword, $post, 10);
                });

                $this->browse(function (Browser $browser) use ($keyword, $post) {
                    $this->crawlDataGoogle($browser, $keyword, $post, 20);
                });

                $keyword->status = config('constant.crawl_keyword.status.crawl_done');
                $keyword->save();
            } catch (\Exception $exception) {
                $keyword->status = config('constant.crawl_keyword.status.error');
                $keyword->save();
                $post->status = config('constant.crawl_post.status.error');
                $post->save();
                \Log::error($exception->getMessage());
            }
        }

        $this->browse(function (Browser $browser) {
            $browser->driver->close();
            $browser->driver->quit();
        });
    }

    /**
     * function description
     *
     * @param $browser
     * @param $keyword
     * @param $post
     * @param $start
     */
    public function crawlDataGoogle($browser, $keyword, $post, $start = 0)
    {
        $name = $keyword->name;

        $url = 'https://www.google.com/search?q=' . $name . '&start=' . $start;

        $browser->visit($url);

        $pageSource = $browser->driver->getPageSource();
        $crawler = new Crawler($pageSource);
        $listPosts = $crawler->filter('.g');
        if ($listPosts->count()) {
            $listPosts->each(function (Crawler $node1, $index) use ($browser, $post) {
                $aTags = $node1->filter('a');
                if ($aTags->count()) {
                    $aTag = $aTags->first();
                    $h3s = $aTag->filter('h3');
                    if ($h3s->count()) {
                        $h3 = $h3s->first();
                        $name = $h3->text();
                    }
                    $url = $aTag->attr('href');
                    $url = urldecode($url);
                    $url = strtok($url, '?');
                    $url = strtok($url, '#');
                    $spans = $node1->filter('.lyLwlc');

                    $searchText = '';
                    if ($spans->count() > 0) {
                        $searchText = $spans->eq(0)->text();
                    }

                    $this->checkAndCreateDetailPost($url, $post, $searchText);
                }
            });
        }
        $browser->pause(rand(1000, 5000));
    }

    /**
     * function description
     *
     * @param $url
     * @param $post
     */
    public function checkAndCreateDetailPost($url, $post, $searchText)
    {
        $crawlPostDetail = CrawlPostDetail::where('crawl_post_id', $post->id)->where('origin_url', $url)->first();
        if (!$crawlPostDetail) {

            foreach ($this->blockDomains as $blockDomain) {
                if (str_contains($url, $blockDomain)) {
                    return false;
                }
            }

            $crawlPostDetail = new CrawlPostDetail();
            $crawlPostDetail->crawl_post_id = $post->id;
            $crawlPostDetail->origin_url = $url;
            $crawlPostDetail->search_text = $searchText;
            $crawlPostDetail->status = config('constant.crawl_post_detail.status.new');
            $crawlPostDetail->save();
        }
    }

    /**
     * function description
     *
     * @param $keyword
     * @return CrawlPost
     */
    public function checkAndCreateNewPost($keyword)
    {
        $post = CrawlPost::where('crawl_keyword_id', $keyword->id)->first();
        if (!$post) {
            $post = new CrawlPost();
            $post->crawl_keyword_id = $keyword->id;
            $post->status = config('constant.crawl_post.status.new');
            $post->save();
        }

        return $post;
    }
}
