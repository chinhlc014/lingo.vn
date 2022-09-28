<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Shop extends BaseModel
{
    use Presentable;

    /**
     * @var false|mixed|string
     */
    protected $table = 'shop';

    protected $primaryKey = '_id';

    protected $fillable = ['_id', 'name', 'slug','image', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    const UPLOAD_DISK = 'public';

    /**
     * @var string
     */
    const IMAGE_DIR = 'upload/shops/image';

    /**
     * The presenter class.
     *
     * @var string
     */
    protected $presenter = Presenters\ShopPresenter::class;
}
