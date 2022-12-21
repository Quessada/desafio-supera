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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('type_id');
            $table->string('year')->nullable();
            $table->string('model');
            $table->string('version');
            $table->string('plate')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type_id')->references('id')->on('vehicle_types');
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
        Schema::dropIfExists('vehicles');
    }
};
