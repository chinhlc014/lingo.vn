<?php

namespace App\Services\Crawl;

use App\Models\Local\CrawlPost;
use App\Models\Local\CrawlPostDetail;
use App\Models\Local\SystemSetting;
use Carbon\Carbon;
use Str;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class CrawlPostService
 *
 * @package App\Services
 */
class CrawlPostService extends CrawlBaseService
{

    protected $blockImageDomains = [
        'static.wikia.nocookie.net',
        'g-ec2.images-amazon.com',
        'img1.miccostumes.com',
        'archives.bulbagarden.net',
    ];

    protected $blockDomains = [
        'tiki.vn',
        'sendo.vn',
        'amazon.com',
        'youtube.com',
    ];

    /**
     * function description
     */
    public function crawlPosts()
    {
        $posts = CrawlPost::where('status',
            config('constant.crawl_post.status.new'))->with(['crawlKeyword'])->limit(2)->get();
        foreach ($posts as $post) {
            echo 'Crawl post: ' . $post->id . PHP_EOL;
            $postDetails = CrawlPostDetail::where('status',
                config('constant.crawl_post_detail.status.new'))->where('crawl_post_id', $post->id)->get();

            $postImage = '';
            $postDescription = '';
            foreach ($postDetails as $key => $postDetail) {
                try {
                    $postDetailFull = $this->getDataCrawlPostDetail($postDetail);
                    if ($postDetailFull->image && !$postImage && $this->checkImage($postDetailFull->image)) {
                        $postImage = $postDetailFull->image;
                    }
                    if ($postDetailFull->description && !$postDescription) {
                        $postDescription = $postDetailFull->description;
                    }
                } catch (\Throwable $exception) {
                    $postDetail->status = config('constant.crawl_post_detail.status.error');
                    $postDetail->save();
                    \Log::error($exception->getMessage());
                }

            }
            $postDetail2s = CrawlPostDetail::where('status',
                config('constant.crawl_post_detail.status.info'))->where('crawl_post_id', $post->id)->get();
            if ($postDetail2s->count()) {
                $count = $postDetail2s->count();
                $post->title = 'Top ' . $count . ' ' . $post->crawlKeyword->name . ' mới nhất';
                $post->image = $postImage;
                $post->description = $postDescription;
                $post->slug = Str::slug($post->title);
                $post->status = config('constant.crawl_post.status.info');
            } else {
                $post->status = config('constant.crawl_post.status.error');
            }
            $post->save();
        }
    }

    /**
     * function description
     *
     * @param $url
     * @return bool
     */
    public function checkImage($url)
    {
        $response = true;

        foreach ($this->blockImageDomains as $blockDomain) {
            if (str_contains($url, $blockDomain)) {
                $response = false;
            }
        }

        return $response;
    }

    /**
     * function description
     *
     * @param  CrawlPostDetail  $postDetail
     */
    public function getDataCrawlPostDetail(CrawlPostDetail $postDetail)
    {
        echo 'Crawl post detail: ' . $postDetail->id . PHP_EOL;

        $url = $postDetail->origin_url;

        $headers = [
            "content-type" => "text/html; charset=UTF-8",
        ];
        $options = [
            'timeout' => 10, // Response timeout
            'connect_timeout' => 10, // Connection timeout
        ];

        $response = $this->httpClient()->get($url, $options);
        $crawler = new Crawler((string)$response->getBody());

        $description = '';
        $description1 = $crawler->filter('meta[name="description"]');
        if ($description1->count()) {
            $description = $description1->eq(0)->attr('content');
        } else {
            $description2 = $crawler->filter('meta[property="og:description"]');
            if ($description2->count()) {
                $description = $description2->eq(0)->attr('content');
            }
        }

        $title = $crawler->filter('title')->text();

        $imageE = $crawler->filter('meta[property="og:image"]');
        $image = '';
        if ($imageE->count()) {
            $image = $imageE->eq(0)->attr('content');
        }

        $ratingData = [];
        $ratingData['max'] = rand(4, 5);
        $ratingData['min'] = rand(2, 4);
        $ratingData['rating'] = rand($ratingData['min'], $ratingData['max']);
        $ratingData['ratingCount'] = rand(500, 100000);

        $date = Carbon::now()->subDays(rand(0, Carbon::now()->dayOfYear))->format('d/m/Y');
        $ratingData['date'] = $date;

        $postDetail->title = $title;
        $postDetail->image = $image;
        $postDetail->description = $description;
        $postDetail->ratingData = $ratingData;
        $postDetail->status = config('constant.crawl_post_detail.status.info');

        $postDetail->save();

        return $postDetail;
    }

    /**
     * function description
     */
    public function crawlBodyPostDetails()
    {
        $systemSetting = SystemSetting::where('key', 'crawl_post_detail_body')->first();
        if (!$systemSetting) {
            $systemSetting = new  SystemSetting();
            $systemSetting->value = 0;
            $systemSetting->key = 'crawl_post_detail_body';
            $systemSetting->save();
        }

        $postDetails = CrawlPostDetail::where('status', config('constant.crawl_post_detail.status.info'))
            ->where('id', '>', $systemSetting->value)->orderBy('id')->limit(15)->get();

        foreach ($postDetails as $postDetail) {
            try {
                if ($this->checkDomain($postDetail->origin_url)) {
                    $this->crawlBodyPostDetail($postDetail);
                }
            } catch (\Throwable $exception) {
                \Log::debug($exception->getMessage());
            }
        }
        $systemSetting->value = $postDetails->max('id');
        $systemSetting->save();
    }

    public function crawlBodyPostDetail($postDetail)
    {
        $url = $postDetail->origin_url;

        $headers = [
            "content-type" => "text/html; charset=UTF-8",
        ];
        $options = [
            'timeout' => 10, // Response timeout
            'connect_timeout' => 10, // Connection timeout
        ];

        $response = $this->httpClient()->get($url, $options);
        $crawler = new Crawler((string)$response->getBody());
        $crawler->filter('nav,script')->each(function (Crawler $crawler) {
            // filters every other node
            foreach ($crawler as $node) {
                $parent2 = $node->parentNode;
                $parent2->removeChild($node);
            }
        });
        $html = '';
        $crawler->filter('p')->each(function (Crawler $node) use (&$html) {
            $nodeHtml = $node->html();
            $html = $html . '<p>' . $nodeHtml . '</p>';
        });

        $html = preg_replace('#<a.*?>(.*?)</a>#i', '\1', $html);

        $postDetail->body = $html;
        $postDetail->slug = Str::slug($postDetail->title);
        if ($html) {
            $postDetail->status = config('constant.crawl_post_detail.status.done');
        }
        $postDetail->save();
    }

    /**
     * function description
     *
     * @param $url
     * @return bool
     */
    public function checkDomain($url)
    {
        $response = true;

        foreach ($this->blockDomains as $blockDomain) {
            if (str_contains($url, $blockDomain)) {
                $response = false;
            }
        }

        return $response;
    }
}
