<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->unsigned();
            $table->double('discount')->default(0);
            // $table->time('start_hour');
            // $table->time('final_hour');
            $table->timestamp('date_suggest'); 
            $table->timestamp('date_appoint');
            $table->text('term_and_conditions');
            $table->double('total');
            $table->double('sub_total');
            $table->string('status');
            $table->string('due_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
