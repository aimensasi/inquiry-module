<?php

namespace Modules\Inquiry\Database\Seeders;

use Modules\Inquiry\Entities\Inquiry;
use Illuminate\Database\Seeder;

class InquiryDatabaseSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){
		Inquiry::truncate();

		factory(Inquiry::class, 80)->create();
  }
}
