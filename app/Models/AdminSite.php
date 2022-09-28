<?php

namespace App\Models;

/**
 * Class AdminSite
 *
 * @package App\Models
 */
class AdminSite extends BaseModel
{
    protected $table = 'admin_sites';

    protected $fillable = [
        'url',
        'short_url',
    ];
}
