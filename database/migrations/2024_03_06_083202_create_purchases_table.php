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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->unsignedBigInteger('purchase_type_id');
            $table->foreign('purchase_type_id')->references('id')->on('purchase_types');
            $table->unsignedBigInteger('purchase_category_id');
            $table->foreign('purchase_category_id')->references('id')->on('purchase_categories');
            $table->unsignedBigInteger('dept_id');
            $table->foreign('dept_id')->references('id')->on('depts');
            $table->string('notes')->nullable();
            $table->double('allocated_budget_php', 15, 2)->default(0);
            $table->double('allocated_budget_usd', 15, 2)->default(0);
            $table->unsignedBigInteger('series_id');
            $table->foreign('series_id')->references('id')->on('series');
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
        Schema::dropIfExists('purchases');
    }
};
