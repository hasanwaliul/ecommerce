<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id('banner_id');
            $table->string('banner_title_en');
            $table->string('banner_title_bn');
            $table->string('banner_subtitle_en');
            $table->string('banner_subtitle_bn');
            $table->string('banner_slug_en');
            $table->string('banner_slug_bn');
            $table->string('banner_img');
            $table->boolean('banner_status', ['1','0'])->default('1');
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
        Schema::dropIfExists('banners');
    }
};
