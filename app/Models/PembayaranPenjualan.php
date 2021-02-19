<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PembayaranPenjualan
 * 
 * @property int $KODE_PEMBAYARAN_PENJUALAN
 * @property int $ID_PENJUALAN
 * @property int|null $ID_OWNER
 * @property Carbon|null $TGL_PEMBAYARAN
 * @property int $STATUS_PEMBAYARAN
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Owner $owner
 * @property Penjualan $penjualan
 * @property Collection|Pengiriman[] $pengirimen
 *
 * @package App\Models
 */
class PembayaranPenjualan extends Model
{
	protected $table = 'pembayaran_penjualan';
	protected $primaryKey = 'KODE_PEMBAYARAN_PENJUALAN';

	protected $casts = [
		'ID_PENJUALAN' => 'int',
		'ID_OWNER' => 'int',
		'STATUS_PEMBAYARAN' => 'int'
	];

	protected $dates = [
		'TGL_PEMBAYARAN'
	];

	protected $fillable = [
		'ID_PENJUALAN',
		'ID_OWNER',
		'TGL_PEMBAYARAN',
		'STATUS_PEMBAYARAN'
	];

	public function owner()
	{
		return $this->belongsTo(Owner::class, 'ID_OWNER');
	}

	public function penjualan()
	{
		return $this->belongsTo(Penjualan::class, 'ID_PENJUALAN');
	}

	public function pengirimen()
	{
		return $this->hasMany(Pengiriman::class, 'KODE_PEMBAYARAN_PENJUALAN');
	}
}
