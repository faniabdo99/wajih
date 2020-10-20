<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersPaymentsTable extends Migration{
    public function up(){
        Schema::create('suppliers_payments', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->text('notes')->nullable();
            $table->integer('supplier_id');
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
        Schema::dropIfExists('suppliers_payments');
    }
}
