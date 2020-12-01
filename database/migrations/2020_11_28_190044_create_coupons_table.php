<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('heading_id')->nullable();
            $table->string('title');
            $table->string('code')->nullable();
            $table->string('affiliate_url')->nullable();
            $table->longText('description')->nullable();
            $table->string('proof_image')->nullable();
            $table->date('expires_at')->nullable();
            $table->date('scheduled_at')->nullable();
            $table->boolean('is_editor_pick')->default(false);
            $table->unsignedInteger('editor_order')->nullable();
            $table->string('coupon_text');
            $table->string('special_message')->nullable();
            $table->timestamps();
            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('heading_id')->references('id')->on('headings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
