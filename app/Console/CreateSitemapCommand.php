<?php

namespace App\Console;

use App\Models\Local\CrawlPost;
use App\Models\ShopeeCategory;
use App\Models\ShopeeItem;
use App\Models\ShopeeShop;
use App\Models\SitemapCloneFile;
use Carbon\Carbon;
use File;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Url;

/**
 * Class CreateSitemapCommand
 *
 * @package App\Console
 */
class CreateSitemapCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'web:create_sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';


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
     * @return mixed
     */
    public function handle()
    {
        ini_set("memory_limit", "-1");
        set_time_limit(0);
        
        \Log::info('Start run web:create_sitemap!');
        if (!config('constant.site_identifier')) {
            return ;
        }
        $siteIdentifier = config('constant.site_identifier');

        $limitItem = 30000;
        $limitItemPerDay = rand(1000,2000);

        try {
            $indexPath = public_path('sitemap_index.xml');
            $categoryPath = public_path('sitemap/sitemap_category.xml');

            $sitemapIndex = SitemapIndex::create();

            // for category
            if (!File::exists($categoryPath)) {
                $categorySitemap = Sitemap::create();

                $categories = ShopeeCategory::whereIn('level', [1, 2])->get();
                foreach ($categories as $category) {
                    $url = route('category', ['slug' => $category->slug]);
                    $categorySitemap->add($url);
                }
                $categorySitemap->writeToFile($categoryPath);
            }

            $sitemapIndex->add('sitemap/sitemap_category.xml');


            $this->createSitemapShopeeItem($limitItem, $limitItemPerDay, $siteIdentifier);
            $this->createSitemapBlog($limitItem, $limitItemPerDay, $siteIdentifier);
            $this->createSitemapShopeeShop($limitItem, $limitItemPerDay, $siteIdentifier);

            // get all sitemap file and add to sitemap_index
            $allFile = SitemapCloneFile::orderBy('created_at', 'desc')
                ->where('type', 'shopee_item')
                ->where('site_identifier', $siteIdentifier)
                ->get();

            // get all sitemap file and add to sitemap_index
            $allFile2 = SitemapCloneFile::orderBy('created_at', 'desc')
                ->where('type', 'blog')
                ->where('site_identifier', $siteIdentifier)
                ->get();

            $allFile3 = SitemapCloneFile::orderBy('created_at', 'desc')
                ->where('type', 'shopee_shop')
                ->where('site_identifier', $siteIdentifier)
                ->get();

            foreach ($allFile as $file) {
                $path = 'sitemap/'.$file->file_name;
                $sitemapIndex->add($path);
            }

            foreach ($allFile2 as $file) {
                $path = 'sitemap/'.$file->file_name;
                $sitemapIndex->add($path);
            }

            foreach ($allFile3 as $file) {
                $path = 'sitemap/'.$file->file_name;
                $sitemapIndex->add($path);
            }

            $sitemapIndex->writeToFile($indexPath);
            \Log::info('End run web:create_sitemap!');
        } catch (\Exception $exception) {
            \Log::error($exception);
        }
    }

    /**
     * function description
     *
     * @param $limitItem
     * @param $limitItemPerDay
     */
    public function createSitemapShopeeItem($limitItem, $limitItemPerDay, $siteIdentifier)
    {
        // for item
        $lastSitemapItem = SitemapCloneFile::orderBy('created_at', 'desc')
            ->where('type', 'shopee_item')
            ->where('site_identifier', $siteIdentifier)
            ->first();
        if (!$lastSitemapItem || $lastSitemapItem->item_count >= $limitItem) {
            $lastSitemapItem = new SitemapCloneFile();
            $lastSitemapItem->file_name = 'sitemap_item_'.Carbon::now()->timestamp.'.xml';
            $lastSitemapItem->type = 'shopee_item';
            $lastSitemapItem->site_identifier = $siteIdentifier;
            $lastSitemapItem->id_from = $this->getMaxSitemapItemId('shopee_item', $siteIdentifier);
            $lastSitemapItem->id_current = $this->getMaxSitemapItemId('shopee_item', $siteIdentifier);
        }

        // get max
        $shopeeItemNews = ShopeeItem::where('id', '>=', $lastSitemapItem->id_current)
            ->where('status', 2)
            ->select(['id'])
            ->orderBy('id', 'asc')
            ->limit($limitItemPerDay)
            ->get();

        $maxItemId = $shopeeItemNews->max('id');
        $lastSitemapItem->id_current = $maxItemId;
        $lastSitemapItem->id_to = $maxItemId;

        // get item for sitemap
        $shopeeItems = ShopeeItem::select(['slug', 'id', 'itemid'])
            ->where('id', '>', $lastSitemapItem->id_from)
            ->where('id', '<=', $lastSitemapItem->id_to)
            ->where('status', 2)
            ->get();

        $newItemSitemap = Sitemap::create();
        $itemPath = 'sitemap/'.$lastSitemapItem->file_name;

        foreach ($shopeeItems as $shopeeItem) {
            $url = route('item', ['slug' => $shopeeItem->present()->slugForDetailPage]);
            $newItemSitemap->add($url);
        }

        $lastSitemapItem->item_count = $shopeeItems->count();
        $lastSitemapItem->save();

        $newItemSitemap->writeToFile(public_path($itemPath));
    }

    /**
     * function description
     *
     * @param $limitItem
     * @param $limitItemPerDay
     */
    public function createSitemapShopeeShop($limitItem, $limitItemPerDay, $siteIdentifier)
    {
        // for item
        $lastSitemapItem = SitemapCloneFile::orderBy('created_at', 'desc')
            ->where('type', 'shopee_shop')
            ->where('site_identifier', $siteIdentifier)
            ->first();
        if (!$lastSitemapItem || $lastSitemapItem->item_count >= $limitItem) {
            $lastSitemapItem = new SitemapCloneFile();
            $lastSitemapItem->file_name = 'shopee_shop_'.Carbon::now()->timestamp.'.xml';
            $lastSitemapItem->type = 'shopee_shop';
            $lastSitemapItem->site_identifier = $siteIdentifier;
            $lastSitemapItem->id_from = $this->getMaxSitemapItemId('shopee_shop', $siteIdentifier);
            $lastSitemapItem->id_current = $this->getMaxSitemapItemId('shopee_shop', $siteIdentifier);
        }

        // get max
        $shopeeShopNews = ShopeeShop::where('id', '>=', $lastSitemapItem->id_current)
            ->select(['id'])
            ->orderBy('id', 'asc')
            ->limit($limitItemPerDay)
            ->get();

        $maxItemId = $shopeeShopNews->max('id');
        $lastSitemapItem->id_current = $maxItemId;
        $lastSitemapItem->id_to = $maxItemId;

        // get item for sitemap
        $shopeeShops = ShopeeShop::select(['slug', 'id', 'shopid', 'updated_at'])
            ->where('id', '>', $lastSitemapItem->id_from)
            ->where('id', '<=', $lastSitemapItem->id_to)
            ->get();

        $newItemSitemap = Sitemap::create();
        $itemPath = 'sitemap/'.$lastSitemapItem->file_name;

        foreach ($shopeeShops as $shopeeShop) {
            $url = $shopeeShop->present()->getRouteUrl;
            $newItemSitemap->add(Url::create($url)->setLastModificationDate(Carbon::parse($shopeeShop->updated_at)));
        }

        $lastSitemapItem->item_count = $shopeeShops->count();
        $lastSitemapItem->save();

        $newItemSitemap->writeToFile(public_path($itemPath));
    }

    /**
     * function description
     *
     * @param $limitItem
     * @param $limitItemPerDay
     * @param $siteIdentifier
     */
    public function createSitemapBlog($limitItem, $limitItemPerDay, $siteIdentifier)
    {
        // for item
        $lastSitemapItem = SitemapCloneFile::orderBy('created_at', 'desc')
            ->where('type', 'blog')
            ->where('site_identifier', $siteIdentifier)
            ->first();
        if (!$lastSitemapItem || $lastSitemapItem->item_count >= $limitItem) {
            $lastSitemapItem = new SitemapCloneFile();
            $lastSitemapItem->file_name = 'sitemap_blog_'.Carbon::now()->timestamp.'.xml';
            $lastSitemapItem->type = 'blog';
            $lastSitemapItem->site_identifier = $siteIdentifier;
            $lastSitemapItem->id_from = $this->getMaxSitemapItemId('blog', $siteIdentifier) ? $this->getMaxSitemapItemId('blog', $siteIdentifier) : 0;
            $lastSitemapItem->id_current = $this->getMaxSitemapItemId('blog', $siteIdentifier) ? $this->getMaxSitemapItemId('blog', $siteIdentifier) : 0;
        }

        // get max
        $blogNews = CrawlPost::where('id', '>=', $lastSitemapItem->id_current)
            ->production()
            ->select(['id'])
            ->orderBy('id', 'asc')
            ->limit($limitItemPerDay)
            ->get();

        $maxItemId = $blogNews->max('id') ?? 0;
        $lastSitemapItem->id_current = $maxItemId;
        $lastSitemapItem->id_to = $maxItemId;

        // get item for sitemap
        $blogs = CrawlPost::select(['slug', 'id'])
            ->where('id', '>', $lastSitemapItem->id_from)
            ->where('id', '<=', $lastSitemapItem->id_to)
            ->production()
            ->select(['id', 'slug', 'updated_at'])
            ->get();

        $newItemSitemap = Sitemap::create();
        $itemPath = 'sitemap/'.$lastSitemapItem->file_name;

        foreach ($blogs as $blog) {
            $url = route('blog_detail', ['slug' => $blog->slug . '-'. $blog->id]);
            $newItemSitemap->add(Url::create($url)->setLastModificationDate(Carbon::parse($blog->updated_at)));
        }

        $lastSitemapItem->item_count = $blogs->count();
        $lastSitemapItem->save();

        $newItemSitemap->writeToFile(public_path($itemPath));
    }


    /**
     * function description
     * @param $type
     * @return int
     */
    public function getMaxSitemapItemId($type, $siteIdentifier)
    {
        $sitemapItem = SitemapCloneFile::orderBy('created_at', 'desc')
            ->where('type', $type)
            ->where('site_identifier', $siteIdentifier)
            ->first();
        if ($sitemapItem) {
            return $sitemapItem->id_to;
        }
        return '';
    }


    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            //['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            //['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
