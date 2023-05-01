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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->double('price')->default(0.0);
            $table->longText('description')->nullable();
            $table->enum('condition', ['New', 'Used', 'Good Second Hand']);
            $table->enum('type', ['Sell', 'Buy', 'Exchange']);
            $table->boolean('is_published')->default(0);
            $table->string('image');
            $table->string('owner_name');
            $table->string('owner_phone');
            $table->string('owner_address');
            $table->double('latitude')->nullable();
            $table->double('longtitude')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
