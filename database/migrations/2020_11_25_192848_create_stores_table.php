<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('logo');
            $table->string('custom_keyword', 32);
            $table->string('website_url');
            $table->string('affiliate_url')->nullable();
            $table->longText('first_paragraph')->nullable();
            $table->longText('middle_paragraph')->nullable();
            $table->unsignedInteger('category_id');
            $table->longText('content')->nullable();
            $table->boolean('top_review')->default(false);
            $table->boolean('popular_store')->default(false);
            $table->string('feature_image')->nullable();
            $table->string('seo_title');
            $table->string('seo_description');
            $table->string('seo_keywords')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
