<?php

namespace App;

use App\Customer;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $table = 'invoices';
	// protected $fillable = [];
	protected $primaryKey = 'id';

	protected $with =['customer'];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}
}
