<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_data', function (Blueprint $table) {
            $table->id();
            $table->string('empl_name');
            $table->string('father_name')->nullable();
            $table->string('emp_number')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->date('date_of_resign')->nullable();
            $table->integer('pf')->nullable();
            $table->integer('esic')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('employee_data');
    }
}
