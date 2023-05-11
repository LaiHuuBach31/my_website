<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity')->default(1);
            $table->float('total_price');
            $table->integer('cus_id')->unsigned();
            $table->integer('pro_id')->unsigned();
            $table->foreign('cus_id')->references('id')->on('customers');
            $table->foreign('pro_id')->references('id')->on('products');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
