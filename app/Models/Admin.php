<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Str;

/**
 * Class Admin
 *
 * @package App\Models
 */
class Admin extends BaseModel implements Authenticatable
{
    use SoftDeletes, AuthenticatableTrait;

    protected $guard = 'admin';

    protected $fillable = ['name', 'email', 'password'];

    protected $table = 'admins';

    protected $primaryKey = '_id';


    /**
     * function description
     *
     * @return string
     */
    public function getPrimaryKey(): string
    {
        return $this->primaryKey;
    }
}
