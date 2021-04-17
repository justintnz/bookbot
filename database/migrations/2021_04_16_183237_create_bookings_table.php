<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('location_id')->constrained('locations');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->foreignId('service_id')->nullable()->constrained('services');
            $table->foreignId('staff_id')->nullable()->constrained('staff');
            $table->String('note')->nullable();
            $table->String('status', 10)->default('available');
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
        Schema::dropIfExists('bookings');
    }
}
