<?php

namespace App\Models\Presenters;

use Laracodes\Presenter\Presenter;

/**
 * Class ShopeeCategoryPresenter
 *
 * @package App\Models\Presenters
 */
class ShopeeCategoryPresenter extends Presenter
{
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
