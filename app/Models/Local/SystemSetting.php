<?php

namespace App\Models\Local;

/**
 * Class SystemSetting
 *
 * @property int|mixed $value
 * @property mixed|string $key
 * @package App\Models\Common
 */
class SystemSetting extends BaseModel
{

    protected $fillable = [
        'key',
        'value',
    ];

    protected $table = 'system_settings';
}
