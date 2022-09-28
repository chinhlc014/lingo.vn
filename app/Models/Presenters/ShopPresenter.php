<?php

namespace App\Models\Presenters;

use App\Models\Reviewer;
use App\Models\Shop;
use File;
use Laracodes\Presenter\Presenter;

/**
 * Class ReviewerPresenter
 *
 * @package App\Models\Presenters
 */
class ShopPresenter extends Presenter
{
    /**
     * function description
     *
     * @return string
     */
    public function image()
    {
        $path = Shop::UPLOAD_DISK . '/' . $this->model->image;
        $storagePath = storage_path('/app/' . $path);
        if ($this->model->image && File::exists($storagePath)) {
            $urlImage = 'storage' . '/' . $this->model->image;
        } else {
            $urlImage = 'adminAssets/img/reviewer.png';
        }

        return asset($urlImage);
    }
}
