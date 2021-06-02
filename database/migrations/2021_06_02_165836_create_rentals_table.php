<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')->constrained();
            $table->foreignId('vehicle_id')->constrained();
            $table->timestamp('vehicle_checkout');
            $table->timestamp('vehicle_checkin')->nullable();
            $table->text('vehicle_initial_condition')->nullable();
            $table->text('vehicle_returned_condition')->nullable();
            $table->enum('rental_status', ['rented', 'returned']);
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
        Schema::dropIfExists('rentals');
    }
}
