<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends BaseModel
{
    protected $table = 'field';

    protected $primaryKey = '_id';

    protected $fillable = ['_id', 'name', 'slug', 'menu_id', 'created_at', 'updated_at'];

    public function trend() {
        return $this->hasMany(Trend::class, 'field_id', '_id');
    }

    /*public function getParentCategories() {
        $categories = $this->where("");
    }*/
}
