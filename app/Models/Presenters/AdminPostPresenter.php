<?php

namespace App\Models\Presenters;

use App\Models\AdminPost;
use File;
use Laracodes\Presenter\Presenter;

/**
 * Class ProfilePresenter
 *
 * @package App\Models\Presenters
 */
class AdminPostPresenter extends Presenter
{
    /**
     * function description
     *
     * @return string
     */
    public function thumbAdmin(): string
    {

        $path = AdminPost::UPLOAD_DISK . '/' . $this->model->thumb;
        $storagePath = storage_path('/app/' . $path);
        if ($this->model->thumb && File::exists($storagePath)) {
            return 'storage' . '/' . $this->model->thumb;
        }

        return 'adminAssets/images/no-image.jpg';
    }

    /**
     * function description
     *
     * @return string
     */
    public function thumb(): string
    {

        $path = AdminPost::UPLOAD_DISK . '/' . $this->model->thumb;
        $storagePath = storage_path('/app/' . $path);
        if ($this->model->thumb && File::exists($storagePath)) {
            return 'storage' . '/' . $this->model->thumb;
        }

        return 'adminAssets/images/no-image.jpg';
    }

    /**
     * function description
     *
     * @return string
     */
    public function adminStatus(): string
    {
        if ($this->model->status == config('constant.post.status.published')) {
            return '<span  class="badge badge-success">Published</span>';
        } else {
            return '<span  class="badge badge-warning">New</span>';
        }
    }
}
