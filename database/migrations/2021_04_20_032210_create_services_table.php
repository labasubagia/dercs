<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('userID');
            $table->string('username');
            $table->string('device');
            $table->string('symptom');
            $table->integer('status')->default(0);//rider gets job
            $table->string('repairStatus')->default('Pending')->nullable();
            $table->string('repairProgress')->default('Pending')->nullable();
            $table->string('detail')->nullable();
            $table->string('reason')->nullable();
            $table->double('estimateCost')->nullable();
            $table->integer('PIC')->nullable();//rider PIC
            $table->integer('paymentStatus')->default(0);//0 is unpaid, 1 is paid
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
        Schema::dropIfExists('services');
    }
}
