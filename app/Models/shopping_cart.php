<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Trolley;
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

	public function Product()
	{
		return $this->belongsTo(Product::class, 'product_id','id');
	}

	public function Trolley()
	{
		return $this->belongsTo(Trolley::class, 'trolley_id','id');
	}
}
