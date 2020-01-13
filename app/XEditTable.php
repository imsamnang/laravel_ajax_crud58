<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XEditTable extends Model
{
	protected $table = 'x_edit_tables';
	protected $fillable = ['first_name','last_name','gender','status'];
}
