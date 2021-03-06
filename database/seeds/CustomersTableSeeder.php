<?php

use App\Invoice;
use App\Customer;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Factory::create();
		\DB::table('customers')->truncate();
		\DB::table('invoices')->truncate();
		// Customer::truncate();
		// Invoice::truncate();
		foreach(range(1, 100) as $i) {
			$customer = Customer::create([
					'name' => $faker->name,
					'company' => $faker->company,
					'email' => $faker->unique()->email,
					'group' => $faker->randomElement(['retailers', 'wholesalers']),
					'total_revenue' => $faker->numberBetween(10, 10000)
			]);
			foreach(range(1, mt_rand(5, 10)) as $j) {
				Invoice::create([
						'customer_id' => $customer->id,
						'issue_date' => now()->subDays(mt_rand(1, 60))->format('Y-m-d'),
						'due_date' => now()->addDays(mt_rand(1, 90))->format('Y-m-d'),
						'total' => $faker->numberBetween(100, 10000)
				]);
			}
		}
	}
}
