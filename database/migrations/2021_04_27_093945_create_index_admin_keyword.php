<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint as Collection;

class CreateIndexAdminKeyword extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_keywords', function (Collection $collection) {
            $collection->index('name');
            $collection->index('no');
            $collection->index('slug');
            $collection->index('no');
            $collection->index('status');
            $collection->index('view_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_keywords');
    }
}
