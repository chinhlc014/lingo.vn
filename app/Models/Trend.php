<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Trend extends BaseModel
{
    use Presentable;

    protected $table = "trend";

    protected $primaryKey = "_id";

    protected $fillable = ["field_id", "title", "thumbnail", "content"];

    public function field() {
        return $this->belongsTo(Field::class, "field_id", "_id");
    }

    /**
     * @var string
     */
    const UPLOAD_DISK = 'public';

    /**
     * @var string
     */
    const IMAGE_DIR = 'upload/trends/thumbnail';

    /**
     * The presenter class.
     *
     * @var string
     */
    protected $presenter = Presenters\TrendPresenter::class;
}
