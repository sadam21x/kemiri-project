<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pengiriman
 * 
 * @property int $KODE_PENGIRIMAN
 * @property int $KODE_PEMBAYARAN_PENJUALAN
 * @property int $ID_ADMIN_GUDANG
 * @property int|null $ID_OWNER
 * @property Carbon $TGL_KIRIM_RIIL
 * @property string $TIPE_KENDARAAN
 * @property string $NOPOL
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Owner $owner
 * @property AdminGudang $admin_gudang
 * @property PembayaranPenjualan $pembayaran_penjualan
 *
 * @package App\Models
 */
class Pengiriman extends Model
{
	protected $table = 'pengiriman';
	protected $primaryKey = 'KODE_PENGIRIMAN';

	protected $casts = [
		'KODE_PEMBAYARAN_PENJUALAN' => 'int',
		'ID_ADMIN_GUDANG' => 'int',
		'ID_OWNER' => 'int'
	];

	protected $dates = [
		'TGL_KIRIM_RIIL'
	];

	protected $fillable = [
		'KODE_PEMBAYARAN_PENJUALAN',
		'ID_ADMIN_GUDANG',
		'ID_OWNER',
		'TGL_KIRIM_RIIL',
		'TIPE_KENDARAAN',
		'NOPOL'
	];

	public function owner()
	{
		return $this->belongsTo(Owner::class, 'ID_OWNER');
	}

	public function admin_gudang()
	{
		return $this->belongsTo(AdminGudang::class, 'ID_ADMIN_GUDANG');
	}

	public function pembayaran_penjualan()
	{
		return $this->belongsTo(PembayaranPenjualan::class, 'KODE_PEMBAYARAN_PENJUALAN');
	}
}
