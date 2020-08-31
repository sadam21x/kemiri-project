<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HasilProduct
 * 
 * @property int $KODE_HASIL_PRODUCT
 * @property int $KODE_PRODUKSI
 * @property string $NAMA_PRODUCT
 * @property float $HASIL_BAGUS_PCS
 * @property float $HASIL_RUSAK_PCS
 * 
 * @property ProsesProduksi $proses_produksi
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class HasilProduct extends Model
{
	protected $table = 'hasil_product';
	protected $primaryKey = 'KODE_HASIL_PRODUCT';
	public $timestamps = false;

	protected $casts = [
		'KODE_PRODUKSI' => 'int',
		'HASIL_BAGUS_PCS' => 'float',
		'HASIL_RUSAK_PCS' => 'float'
	];

	protected $fillable = [
		'KODE_PRODUKSI',
		'NAMA_PRODUCT',
		'HASIL_BAGUS_PCS',
		'HASIL_RUSAK_PCS'
	];

	public function proses_produksi()
	{
		return $this->belongsTo(ProsesProduksi::class, 'KODE_PRODUKSI');
	}

	public function products()
	{
		return $this->hasOne(Product::class, 'KODE_HASIL_PRODUCT');
	}
}
