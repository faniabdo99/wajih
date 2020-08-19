<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up(){
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('customer_id');
            $table->string('model_number')->nullable();
            $table->integer('pieces');
            $table->integer('price_per_piece');
            $table->text('notes');
            $table->integer('company_id');
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
        Schema::dropIfExists('sales');
    }
}
