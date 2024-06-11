<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class shopping_cart extends Model
{
	use HasFactory, SoftDeletes;
	protected $fillable = [
		'trolley_id',
		'product_id',
		'stock'
	];
}
