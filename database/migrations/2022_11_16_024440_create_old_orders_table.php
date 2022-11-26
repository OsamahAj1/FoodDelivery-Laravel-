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
        Schema::create('old_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->constrained('users');
            $table->foreignId('delivery_id')->nullable()->constrained('users');
            $table->foreignId('client_id')->constrained('users');
            $table->text('order');
            $table->decimal('sum_order');
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
        Schema::dropIfExists('old_orders');
    }
};
