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
        Schema::create('mortgages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('address');
            $table->string('items');
            $table->string('weight');
            $table->decimal('rate', 8, 2);
            $table->decimal('amount', 10, 2);
            $table->boolean('confirmed')->nullable()->default(false);
            $table->timestamps();
            // $table->date('create');
            // $table->date('update');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mortgages');
    }
};
