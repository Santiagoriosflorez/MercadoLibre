<?php

namespace App\Models;

use App\Models\Category;
use App\Models\shopping_cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use HasFactory, SoftDeletes;


	protected $fillable = [
		'category_id',
		'name',
		'description',
		'worth',
		'stock',
	];

	public function Category()
	{
		return $this->belongsTo(Category::class, 'category_id','id');
	}

	public function shopping_cart()
	{
		return $this->hasMany(shopping_cart::class, 'product_id','id');
	}
}
