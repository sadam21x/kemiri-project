<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JenisProduct
 * 
 * @property int $KODE_JENIS_PRODUCT
 * @property string $NAMA_JENIS_PRODUCT
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class JenisProduct extends Model
{
	protected $table = 'jenis_product';
	protected $primaryKey = 'KODE_JENIS_PRODUCT';

	protected $fillable = [
		'NAMA_JENIS_PRODUCT'
	];

	public function products()
	{
		return $this->hasMany(Product::class, 'KODE_JENIS_PRODUCT');
	}
}
