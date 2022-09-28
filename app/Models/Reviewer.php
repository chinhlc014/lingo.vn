<?php

namespace App\Models;

use Laracodes\Presenter\Traits\Presentable;

/**
 * Class Reviewer
 *
 * @package App\Models
 */
class Reviewer extends BaseModel
{
    use Presentable;

    protected $table = 'reviewers';

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'site_identifier',
    ];

    /**
     * @var string
     */
    const UPLOAD_DISK = 'public';

    /**
     * @var string
     */
    const IMAGE_DIR = 'upload/reviewers/image';

    /**
     * The presenter class.
     *
     * @var string
     */
    protected $presenter = Presenters\ReviewerPresenter::class;
}