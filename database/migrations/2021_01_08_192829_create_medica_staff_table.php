<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicaStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicaStaff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('doctor_name_ar');
            $table->string('doctor_name_en');
            $table->string('photo')->nullable();
            $table->integer('special_id')->unsigned();
            $table->foreign('special_id')->references('id')->on('specialties')->onDelete('cascade');
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
        Schema::dropIfExists('medicaStaff');
    }
}
