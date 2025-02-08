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
        Schema::create('bike_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bike_id'); 
            $table->date('pickup_date');
            $table->date('drop_date');
            $table->string('customer_name');
            $table->string('phone_number');
            $table->string('package_type');
            $table->string('package_detail');
            $table->timestamps();

            $table->foreign('bike_id')->references('id')->on('bikes')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bike_notifications');
    }
};
