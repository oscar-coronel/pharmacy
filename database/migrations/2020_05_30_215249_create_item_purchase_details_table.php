<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_purchase_details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('quantity');
            $table->decimal('price',8,2);
            $table->decimal('subtotal',8,2);
            $table->decimal('iva_value',8,2);
            $table->decimal('total',8,2);
            $table->timestamps();

            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('item_purchase_id');
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
        Schema::dropIfExists('item_purchase_details');
    }
}
