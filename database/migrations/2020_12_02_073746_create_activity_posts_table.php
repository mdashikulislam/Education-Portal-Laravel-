<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('slug');
            $table->string('image');
            $table->string('logo');
            $table->longText('description');
            $table->tinyInteger('status')->default(0)->comment('0=Inactive,1=Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_posts');
    }
}
