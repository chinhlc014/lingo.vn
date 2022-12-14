<?php

namespace App\Models\Presenters;

use Laracodes\Presenter\Presenter;

/**
 * Class ShopeeItemPresenter
 *
 * @package App\Models\Presenters
 */
class ShopeeItemPresenter extends Presenter
{
    /**
     * function description
     *
     * @return string
     */
    public function price(): string
    {
        return $this->model->price / 100000;
    }

    /**
     * function description
     *
     * @return string
     */
    public function priceFormat(): string
    {
        return number_format($this->price(), 0, ',', '.');
    }

    /**
     * function description
     *
     * @return string
     */
    public function priceFormatWithCurrency()
    {
        $rs = '';
        switch (config('domains.code') == 'vn') {
            case 'vn':
                $rs = config('domains.currency') . ' ' . $this->priceFormat();

                break;

            default:
                $rs = config('domains.currency') . ' ' . $this->priceFormat();

                break;
        }

        return $rs;
    }

    /**
     * function description
     *
     * @return string
     */
    public function priceBeforeDiscount(): string
    {
        if ($this->model->discount) {
            $response = $this->model->price_before_discount / 100000;
        } else {
            $response = $this->model->price / 100000;
        }

        return number_format($response, 0, ',', '.');
    }

    /**
     * function description
     *
     * @return string
     */
    public function imageThumb(): string
    {
        return config('domains.image_url') . '/file/' . $this->model->image . '_tn';
    }

    /**
     * function description
     *
     * @return string
     */
    public function image(): string
    {
        return config('domains.image_url') . '/file/' . $this->model->image;
    }

    /**
     * function description
     *
     * @return string
     */
    public function slugForDetailPage(): string
    {
        return $this->model->slug . '-' . $this->model->itemid;
    }

    /**
     * function description
     *
     * @return string
     */
    public function shortenRating()
    {
        $ratingCount = data_get($this->model, 'item_rating.rating_count');
        $totalRating = is_array($ratingCount) ? $ratingCount[0] : $ratingCount;

        return number_shorten($totalRating, 0);
    }

    /**
     * function description
     *
     * @return string
     */
    public function ratingCount()
    {
        $ratingCount = data_get($this->model, 'item_rating.rating_count');
        $totalRating = is_array($ratingCount) ? $ratingCount[0] : $ratingCount;

        return $totalRating;
    }

    /**
     * function description
     *
     * @return string
     */
    public function shortenHistoricalSold()
    {
        $historicalSold = data_get($this->model, 'historical_sold');

        return number_shorten($historicalSold, 0);
    }

    /**
     * function description
     *
     * @return string
     */
    public function shortenStock()
    {
        $stock = data_get($this->model, 'stock');

        return number_shorten($stock, 0);
    }

    /**
     * function description
     *
     * @param $star
     * @return int|mixed
     */
    public function getRatingByStar($star): int
    {
        $ratingCount = data_get($this->model, 'item_rating.rating_count');
        if (is_array($ratingCount)) {
            if (isset($ratingCount[$star])) {
                return $ratingCount[$star];
            }
        }

        return 0;
    }

    /**
     * function description
     *
     * @param $star
     * @return int
     */
    public function getPercentRatingByStar($star): int
    {
        $ratingCount = data_get($this->model, 'item_rating.rating_count');
        $totalRating = is_array($ratingCount) ? $ratingCount[0] : $ratingCount;

        $rating = $this->getRatingByStar($star);

        return $totalRating ? intval($rating / $totalRating * 100) : 0;
    }

    /**
     * function description
     *
     * @param int $precision
     * @return float
     */
    public function getRatingStar(int $precision = 1): float
    {
        $ratingStar = data_get($this->model, 'item_rating.rating_star', 0) ? data_get($this->model, 'item_rating.rating_star', 0) : 5;
        return round($ratingStar, $precision);
    }

    /**
     * function description
     *
     * @param  int  $width
     * @return string
     */
    public function getRatingStarImages($width = 12): string
    {
        $rate = round(data_get($this->model, 'item_rating.rating_star'), 1);
        $whole = (int) $rate;
        $fraction = $rate - $whole;

        $full = $whole;

        if ($fraction >= 0.5) {
            $half = 1;
        } else {
            $half = 0;
        }
        $empty = 5 - $full - $half;

        $htmlFull = str_repeat('<img src="/web/images/icons/stars/primary-full.svg" alt="primary-full" style="width: ' . $width . 'px; height: ' . $width . 'px; margin-right: 1px;">',
            $full);
        $htmlHalf = str_repeat('<img src="/web/images/icons/stars/primary-half.svg" alt="primary-half" style="width: ' . $width . 'px; height: ' . $width . 'px; margin-right: 1px;">',
            $half);
        $htmlEmpty = str_repeat('<img src="/web/images/icons/stars/primary-empty.svg" alt="primary-empty" style="width: ' . $width . 'px; height: ' . $width . 'px; margin-right: 1px;">',
            $empty);

        return $htmlFull . $htmlHalf . $htmlEmpty;
    }

    /**
     * url
     *
     * @return string
     */
    public function getRedirectLink()
    {
        return route('redirectToShopee', [
            'slug' => $this->model->slug,
            'shopid' => $this->model->shopid,
            'itemid' => $this->model->itemid,
        ]);
    }

    public function getShortDes()
    {
        $text = '';
        $text = $text . 'S???n ph???m <strong>' . $this->name . '</strong> ??ang ???????c m??? b??n v???i m???c gi?? si??u t???t khi mua online, ';
        if ($this->discount) {
            $text = $text . 'V???a ???????c gi???m gi?? t??? <strong>' . $this->priceBeforeDiscount() . '</strong> xu???ng c??n <strong>'
                . $this->priceFormatWithCurrency() . '</strong>, ';
        }
        $text = $text . 'giao h??ng online tr??n to??n qu???c v???i chi ph?? ti???t ki???m nh???t,';
        $text = $text . $this->sold . ' ???? ???????c b??n ra k??? t??? l??c ch??o b??n l???n cu???i c??ng.';
        return $text . 'Tr??n ????y l?? s??? li???u v??? s???n ph???m ch??ng t??i th???ng k?? v?? g???i ?????n b???n, hi v???ng v???i nh???ng g???i ?? ??? tr??n gi??p b???n mua s???m t???t h??n t???i ' . config('domains.web_name');
    }
}
