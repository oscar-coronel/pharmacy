<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->decimal('price',8,2);
            $table->decimal('subtotal',8,2);
            $table->decimal('iva_value',8,2);
            $table->decimal('total',8,2);
            $table->timestamps();

            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('invoice_id');
            $table->enum('state', ['1','0'])->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_details');
    }
}
