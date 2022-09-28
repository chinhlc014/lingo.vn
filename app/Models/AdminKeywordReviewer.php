<?php

namespace App\Models;

use Jenssegers\Mongodb\Relations\BelongsTo;

/**
 * Class AdminKeywordReviewer
 *
 * @package App\Models
 */
class AdminKeywordReviewer extends BaseModel
{
    protected $fillable = [
        'admin_keyword_id',
        'reviewer_id',
    ];

    protected $table = 'admin_keyword_reviewers';

    /**
     * function description
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|BelongsTo
     */
    public function reviewer()
    {
        return $this->belongsTo(Reviewer::class, 'reviewer_id');
    }

    /**
     * function description
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|BelongsTo
     */
    public function adminKeyword()
    {
        return $this->belongsTo(AdminKeyword::class, 'admin_keyword_id');
    }
}