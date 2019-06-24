<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorRegistartionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_registartion', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();;
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
           // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
          $table->boolean('verified')->default(0); 
            $table->string('email_token')->nullable(); 
            $table->string('usertype');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.



       Schema::create('users', function (Blueprint $table) 
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_registartion');
    }
}
