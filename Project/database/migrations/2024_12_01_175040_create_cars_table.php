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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_companyname');
            $table->string('car_brandname');
            $table->longText('car_image');
            $table->longText('pricing_image');
            $table->string('car_type');
            $table->string('car_model');
            $table->string('transmission');
            $table->string('base_price');
            $table->string('fuel');
            $table->json('package_details')->nullable();
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
        Schema::dropIfExists('cars');
    }
};
