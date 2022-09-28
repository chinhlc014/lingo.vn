<?php

namespace App\Models\Presenters;

use App\Models\Trend;
use File;
use Laracodes\Presenter\Presenter;

/**
 * Class ReviewerPresenter
 *
 * @package App\Models\Presenters
 */
class TrendPresenter extends Presenter
{
    /**
     * function description
     *
     * @return string
     */
    public function thumbnail()
    {
        $path = Trend::UPLOAD_DISK . '/' . $this->model->thumbnail;
        $storagePath = storage_path('/app/' . $path);
        if ($this->model->thumbnail && File::exists($storagePath)) {
            $urlImage = 'storage' . '/' . $this->model->thumbnail;
        } else {
            $urlImage = 'adminAssets/img/reviewer.png';
        }

        return asset($urlImage);
    }
}
