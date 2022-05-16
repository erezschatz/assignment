<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

	protected $fillable = [
		'product_name', 'price', 'currency', 'payme_sale_code', 'sale_url'
	];

}
