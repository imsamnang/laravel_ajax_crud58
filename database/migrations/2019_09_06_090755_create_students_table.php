<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{

    public function up()
    {
			Schema::create('students', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->integer('nis');
				$table->string('name');
				$table->string('class');
				$table->string('photo');
				$table->timestamps();
			});
    }

    public function down()
    {
			Schema::dropIfExists('students');
    }
}
