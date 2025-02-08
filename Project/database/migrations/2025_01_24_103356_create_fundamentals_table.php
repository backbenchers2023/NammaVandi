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
        Schema::create('fundamentals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total_travels');
            $table->bigInteger('happy_customers');
            $table->bigInteger('total_branches');
            $table->longText('bike_pricing_image'); 
            $table->longText('car_pricing_image'); 
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
        Schema::dropIfExists('fundamentals');
    }
};
