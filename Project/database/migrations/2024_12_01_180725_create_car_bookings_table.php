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
        Schema::create('car_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id'); 
            $table->date('pickup_date');
            $table->date('drop_date');
            $table->string('customer_name');
            $table->string('phone_number');
            $table->string('package_type');
            $table->string('package_detail');
            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_bookings');
    }
};
