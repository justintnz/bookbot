<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->nullable()->constrained('bookings');
            $table->dateTime('start_at');
            $table->dateTime('end_at')->nullable();
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('location_id')->constrained('locations');
            $table->foreignId('service_id')->constrained('services');
            $table->foreignId('staff_id')->constrained('staff');
            $table->double('charge')->default(0);
            $table->String('status', 10)->default('available');
            $table->json('data');
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
        Schema::dropIfExists('jobs');
    }
}
