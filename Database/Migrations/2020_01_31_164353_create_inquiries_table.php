<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiriesTable extends Migration{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::create('inquiries', function (Blueprint $table) {
      $table->bigIncrements('id');
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->text('message')->nullable();
			$table->string('subject')->nullable();
			$table->string('status')->default('Pending');
			$table->boolean('is_member')->default(false);
			$table->unsignedInteger('member_id')->nullable();
			$table->dateTime('resolved_at')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){
    Schema::dropIfExists('inquiries');
  }
}
