<?php

namespace App\Models\Presenters;

use Laracodes\Presenter\Presenter;

/**
 * Class AdminKeywordPresenter
 *
 * @package App\Models\Presenters
 */
class AdminKeywordPresenter extends Presenter
{
    /**
     * function description
     *
     * @return string
     */
    public function adminStatus(): string
    {
        if ($this->model->status == 1) {
            return '<span  class="badge badge-success">Get Item done</span>';
        } else {
            return '<span  class="badge badge-warning">New</span>';
        }
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
}