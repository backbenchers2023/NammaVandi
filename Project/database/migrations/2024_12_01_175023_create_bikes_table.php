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
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->string('bike_companyname');
            $table->string('bike_brandname');
            $table->longText('bike_image');
            $table->longText('pricing_image');
            $table->string('bike_type');
            $table->string('bike_model');
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
        Schema::dropIfExists('bikes');
    }
};
