<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_details', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('clientid'); // Client ID, assuming it's a string
            $table->integer('num_of_payment'); // Total number of payments (EMIs)
            $table->date('first_payment_date'); // Start date of payment
            $table->date('last_payment_date'); // End date of payment
            $table->decimal('loan_amount', 15, 2); // Total amount to be paid, with 2 decimal places
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_details');
    }
}
