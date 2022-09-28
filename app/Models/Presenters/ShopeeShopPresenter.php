<?php

namespace App\Models\Presenters;

use Laracodes\Presenter\Presenter;

/**
 * Class ShopeeShopPresenter
 *
 * @package App\Models\Presenters
 */
class ShopeeShopPresenter extends Presenter
{
    /**
     * function description
     *
     * @return string
     */
    public function imageThumb(): string
    {
        if ($this->model->portrait) {
            return config('domains.image_url') . '/file/' . $this->model->portrait . '_tn';
        }

        return '';
    }

    /**
     * function description
     *
     * @return string
     */
    public function image(): string
    {
        if ($this->model->portrait) {
            return config('domains.image_url') . '/file/' . $this->model->portrait;
        }

        return '';
    }

    /**
     * function description
     *
     * @return string
     */
    public function shortenRating()
    {
        $totalRating = $this->model->rating_bad + $this->model->rating_normal + $this->model->rating_good;

        return number_shorten($totalRating, 1);
    }

    /**
     * function description
     *
     * @return string
     */
    public function ratingCount()
    {
        $totalRating = $this->model->rating_bad + $this->model->rating_normal + $this->model->rating_good;

        return $totalRating;
    }

    /**
     * function description
     *
     * @param int $precision
     * @return float
     */
    public function getRatingStar(int $precision = 1): float
    {
        return round(data_get($this->model, 'rating_star', 5), $precision);
    }


    /**
     * function description
     *
     * @return string
     */
    public function getOriginLink()
    {
        return config('domains.url') . '/' . $this->model->username;
    }

    /**
     * function description
     *
     * @return string
     */
    public function getRouteUrl()
    {
        $slug = $this->model->slug. '-' . $this->model->shopid;
        return route('shop', ['slug' => $slug]);
    }
}
