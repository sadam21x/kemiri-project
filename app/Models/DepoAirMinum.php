<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DepoAirMinum
 * 
 * @property int $KODE_DEPO
 * @property string $KODE_KOTA
 * @property int $ID_SALES_A
 * @property string $NAMA_CUSTOMER
 * @property string $NAMA_DEPO
 * @property string $ALAMAT_DEPO
 * @property string|null $NO_TELP_DEPO
 * @property string|null $EMAIL_DEPO
 * 
 * @property Kotum $kotum
 * @property SalesA $sales_a
 * @property Collection|KonfirmasiPenjualan[] $konfirmasi_penjualans
 *
 * @package App\Models
 */
class DepoAirMinum extends Model
{
	protected $table = 'depo_air_minum';
	protected $primaryKey = 'KODE_DEPO';
	public $timestamps = false;

	protected $casts = [
		'ID_SALES_A' => 'int'
	];

	protected $fillable = [
		'KODE_KOTA',
		'ID_SALES_A',
		'NAMA_CUSTOMER',
		'NAMA_DEPO',
		'ALAMAT_DEPO',
		'NO_TELP_DEPO',
		'EMAIL_DEPO'
	];

	public function kotum()
	{
		return $this->belongsTo(Kotum::class, 'KODE_KOTA');
	}

	public function sales_a()
	{
		return $this->belongsTo(SalesA::class, 'ID_SALES_A');
	}

	public function konfirmasi_penjualans()
	{
		return $this->hasMany(KonfirmasiPenjualan::class, 'KODE_DEPO');
	}
}