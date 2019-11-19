<?php

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{

    public function run()
    {
      factory(App\Contact::class,50)->create();
    }
}
