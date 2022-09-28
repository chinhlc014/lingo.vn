<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryOfField extends BaseModel
{
    protected $table = "categories_of_field";

    protected $primaryKey = "_id";

    protected $fillable = ["menu_id", "field_id", "parent_id", "name", "description"];
}
