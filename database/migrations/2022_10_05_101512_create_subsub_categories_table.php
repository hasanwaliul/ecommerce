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
        Schema::create('subsub_categories', function (Blueprint $table) {
            $table->id('subsubcategory_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->string('subsubcategory_name_en');
            $table->string('subsubcategory_name_bn');
            $table->string('subsubcategory_slug_en');
            $table->string('subsubcategory_slug_bn');
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
        Schema::dropIfExists('subsub_categories');
    }
};
