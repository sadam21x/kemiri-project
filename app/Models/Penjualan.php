<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Penjualan
 * 
 * @property int $ID_PENJUALAN
 * @property int $KODE_DEPO
 * @property int|null $ID_MANAJER_MARKETING
 * @property int|null $ID_SALES_B
 * @property int|null $ID_OWNER
 * @property int|null $ID_METODE_KIRIM
 * @property Carbon $TGL_PENJUALAN
 * @property Carbon $TGL_KIRIM
 * @property int $ONGKOS_KIRIM
 * @property int $TOTAL_PENJUALAN
 * @property int $STATUS_PENJUALAN
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ManajerMarketing $manajer_marketing
 * @property SalesB $sales_b
 * @property MetodeKirim $metode_kirim
 * @property Owner $owner
 * @property DepoAirMinum $depo_air_minum
 * @property Collection|DetilPenjualan[] $detil_penjualans
 * @property Collection|PembayaranPenjualan[] $pembayaran_penjualans
 *
 * @package App\Models
 */
class Penjualan extends Model
{
	protected $table = 'penjualan';
	protected $primaryKey = 'ID_PENJUALAN';

	protected $casts = [
		'KODE_DEPO' => 'int',
		'ID_MANAJER_MARKETING' => 'int',
		'ID_SALES_B' => 'int',
		'ID_OWNER' => 'int',
		'ID_METODE_KIRIM' => 'int',
		'ONGKOS_KIRIM' => 'int',
		'TOTAL_PENJUALAN' => 'int',
		'STATUS_PENJUALAN' => 'int'
	];

	protected $dates = [
		'TGL_PENJUALAN',
		'TGL_KIRIM'
	];

	protected $fillable = [
		'KODE_DEPO',
		'ID_MANAJER_MARKETING',
		'ID_SALES_B',
		'ID_OWNER',
		'ID_METODE_KIRIM',
		'TGL_PENJUALAN',
		'TGL_KIRIM',
		'ONGKOS_KIRIM',
		'TOTAL_PENJUALAN',
		'STATUS_PENJUALAN'
	];

	public function manajer_marketing()
	{
		return $this->belongsTo(ManajerMarketing::class, 'ID_MANAJER_MARKETING');
	}

	public function sales_b()
	{
		return $this->belongsTo(SalesB::class, 'ID_SALES_B');
	}

	public function metode_kirim()
	{
		return $this->belongsTo(MetodeKirim::class, 'ID_METODE_KIRIM');
	}

	public function owner()
	{
		return $this->belongsTo(Owner::class, 'ID_OWNER');
	}

	public function depo_air_minum()
	{
		return $this->belongsTo(DepoAirMinum::class, 'KODE_DEPO');
	}

	public function detil_penjualans()
	{
		return $this->hasMany(DetilPenjualan::class, 'ID_PENJUALAN');
	}

	public function pembayaran_penjualans()
	{
		return $this->hasMany(PembayaranPenjualan::class, 'ID_PENJUALAN');
	}
}
