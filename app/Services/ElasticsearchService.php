<?php

namespace App\Services;

use App\Models\ShopeeItem;
use App\Support\StringHelper;
use Elasticsearch\ClientBuilder;
use Modules\Crawl\Models\ShopeeItem as CrawlShopeeItem;

/**
 * Class ElasticsearchService
 *
 * @package App\Services
 */
class ElasticsearchService
{
    /**
     * function description
     *
     * @param \App\Models\ShopeeItem $item
     * @return array
     */
    public function getItemComparison(ShopeeItem $item): array
    {
        $nameSlug = StringHelper::makeNameSlug($item->name);

        $nameSlugNumber = StringHelper::makeNameSlugNumber($nameSlug);

        if ($item->brand) {
            $brand = mb_strtolower($item->brand->name);
        } else {
            $brand = null;
        }

        $must = [];
        if ($brand) {
            $must[] = ['term' => ['brand' => $brand]];
        }

        if ($item->direct_cate_id) {
            $must[] = ['term' => ['direct_cate_id' => $item->direct_cate_id]];
        }
        if ($nameSlugNumber) {
            $must[] = ['match' => ['name_slug_number' => $nameSlugNumber]];
        }

        $should = [];
        if ($nameSlug) {
            $should[] = ['match' => ['name_slug' => $nameSlug]];
        }

        $mustNot[] = ['match' => ['id' => $item->id]];

        $body = [
            'query' => [
                'bool' => [
                    'should' => $should,
                    'must' => $must,
                    'must_not' => $mustNot,
                ],
            ],
        ];

        $elasticsearch = ClientBuilder::create()->build();

        $body['size'] = 30;

        $instance = new CrawlShopeeItem();
        $response = $elasticsearch->search([
            'index' => $instance->getSearchIndex(),
            'type' => $instance->getSearchType(),
            'body' => $body,
        ]);

        if (isset($response['hits']['hits'])) {
            $hits = $response['hits']['hits'];
            $collect = collect($hits);

            $scoreLimit = $this->caculateScore($nameSlug, $nameSlugNumber);
            $collectA = $collect->filter(function ($eItem) use ($scoreLimit) {
                return ($eItem['_score'] > $scoreLimit);
            });

            $collectA = $collectA->map(function ($eItem) {
                return [
                    'score' => $eItem['_score'],
                    'name_slug' => $eItem['_source']['name_slug'],
                    'id' => $eItem['_source']['id'],
                ];
            });

            return $collectA->all();
        }

        return [];
    }

    /**
     * function description
     *
     * @param $nameSlug
     * @param $nameSlugNumber
     * @return int
     */
    public function caculateScore($nameSlug, $nameSlugNumber)
    {
        $nameSlugLength = strlen($nameSlug);
        $nameSlugNumberLength = strlen($nameSlugNumber);

        $nameSlugWordCount = substr_count($nameSlug, ' ') + 1;
        $nameSlugNumberWordCount = $nameSlugNumber ? substr_count($nameSlugNumber, ' ') + 1 : 0;

        $score = $nameSlugWordCount + $nameSlugNumberWordCount;
//        var_dump($score, $nameSlugLength, $nameSlugNumberLength, $nameSlugWordCount, $nameSlugNumberWordCount);

        return $score;
    }

    /**
     * function description
     *
     * @param $queries
     * @param int $limit
     * @param int $skip
     * @return array
     */
    public function search($queries, $limit = 16, $skip = 0): array
    {
        $should = [];

        if (isset($queries['name'])) {
            $should[] = ['match' => ['name_slug' => $queries['name']]];
        }

        $must = [];
        if (isset($queries['shopid'])) {
            $must[] = ['term' => ['shopid' => $queries['shopid']]];
        }

        $body = [
            'query' => [
                'bool' => [
                    'should' => $should,
                    'must' => $must,
                ],
            ],
        ];

        $elasticsearch = ClientBuilder::create()->build();

        $body['size'] = $limit;
        $body['from'] = $skip;

        $instance = new CrawlShopeeItem();
        $response = $elasticsearch->search([
            'index' => $instance->getSearchIndex(),
            'type' => $instance->getSearchType(),
            'body' => $body,
        ]);

        if (isset($response['hits']['hits'])) {
            $hits = $response['hits']['hits'];

            $collectA = collect($hits)->map(function ($eItem) {
                return [
                    'id' => $eItem['_source']['id'],
                ];
            });
            return $collectA->pluck('id')->values()->all();
        }

        return [];
    }
}
