<?php

namespace App\Models;

use Laracodes\Presenter\Traits\Presentable;

/**
 * Class AdminKeyword
 *
 * @package App\Models
 */
class AdminKeyword extends BaseModel
{
    use Presentable;

    protected $fillable = [
        'name',
        'no',
        'status',
        'view_time',
        'questions',
        'content',
    ];

    protected $table = 'admin_keywords';

    /**
     * The presenter class.
     *
     * @var string
     */
    protected $presenter = Presenters\AdminKeywordPresenter::class;

    /**
     * function description
     *
     * @return mixed
     */
    public function getMaxNo()
    {
        return $this->max('no');
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * function description
     *
     * @return BelongsTo|\Illuminate\Database\Eloquent\Relations\BelongsTo|\Illuminate\Database\Eloquent\Relations\HasMany|\Jenssegers\Mongodb\Relations\HasMany
     */
    public function adminKeywordSites()
    {
        return $this->hasMany(AdminKeywordSite::class, 'admin_keyword_id');
    }
}
