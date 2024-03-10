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
            $table->float('default_expense_php', 8, 2);
            $table->float('default_expense_usd', 8, 2);
            $table->string('notes')->nullable();
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
