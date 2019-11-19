<?php

namespace App;

use App\Invoice;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $table = 'customers';
	// protected $fillable = [];
	protected $primaryKey = 'id';

	// protected $with =['invoices'];

	public function invoices()
	{
		return $this->hasMany(Invoice::class);
	}
}
