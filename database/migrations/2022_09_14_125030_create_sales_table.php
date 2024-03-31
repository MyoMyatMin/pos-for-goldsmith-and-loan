<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('items');
            $table->string('address');
            $table->decimal('price', 10, 2);
            $table->string('quality');
            $table->string('kyat')->nullable();
            $table->string('pay')->nullable();
            $table->string('yway')->nullable();
            $table->string('ytpay')->nullable();
            $table->string('ytyway')->nullable();
            $table->decimal('purchaseAmt', 10, 2);
            $table->decimal('amount', 10, 2);
            $table->decimal('debt', 10, 2);
            $table->string('remarks');
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
        Schema::dropIfExists('sales');
    }
};
