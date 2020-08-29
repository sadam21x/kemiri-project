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
 * @property int $ID_MANAJER_MARKETING
 * @property int $ID_KONFIRMASI_PENJUALAN
 * @property int $ID_SALES_B
 * @property Carbon $TGL_PENJUALAN
 * @property Carbon $TGL_KIIRM
 * @property string $METODE_KIRIM
 * @property int $TOTAL_PENJUALAN
 * @property bool $STATUS_PENJUALAN
 * 
 * @property ManajerMarketing $manajer_marketing
 * @property SalesB $sales_b
 * @property KonfirmasiPenjualan $konfirmasi_penjualan
 * @property Collection|DetilPenjualan[] $detil_penjualans
 * @property Collection|EvaluasiKinerjaSale[] $evaluasi_kinerja_sales
 * @property Collection|PembayaranPenjualan[] $pembayaran_penjualans
 *
 * @package App\Models
 */
class Penjualan extends Model
{
	protected $table = 'penjualan';
	protected $primaryKey = 'ID_PENJUALAN';
	public $timestamps = false;

	protected $casts = [
		'ID_MANAJER_MARKETING' => 'int',
		'ID_KONFIRMASI_PENJUALAN' => 'int',
		'ID_SALES_B' => 'int',
		'TOTAL_PENJUALAN' => 'int',
		'STATUS_PENJUALAN' => 'bool',
		'ONGKOS_KIRIM' => 'int'
	];

	protected $dates = [
		'TGL_PENJUALAN',
		'TGL_KIRIM'
	];

	protected $fillable = [
		'ID_MANAJER_MARKETING',
		'ID_KONFIRMASI_PENJUALAN',
		'ID_SALES_B',
		'TGL_PENJUALAN',
		'TGL_KIRIM',
		'METODE_KIRIM',
		'TOTAL_PENJUALAN',
		'STATUS_PENJUALAN',
		'ONGKOS_KIRIM'
	];

	public function manajer_marketing()
	{
		return $this->belongsTo(ManajerMarketing::class, 'ID_MANAJER_MARKETING');
	}

	public function sales_b()
	{
		return $this->belongsTo(SalesB::class, 'ID_SALES_B');
	}

	public function konfirmasi_penjualan()
	{
		return $this->belongsTo(KonfirmasiPenjualan::class, 'ID_KONFIRMASI_PENJUALAN');
	}

	public function detil_penjualans()
	{
		return $this->hasMany(DetilPenjualan::class, 'ID_PENJUALAN');
	}

	public function evaluasi_kinerja_sales()
	{
		return $this->hasMany(EvaluasiKinerjaSale::class, 'ID_PENJUALAN');
	}

	public function pembayaran_penjualan()
	{
		return $this->hasOne(PembayaranPenjualan::class, 'ID_PENJUALAN');
	}
}
