<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KonfirmasiPenjualan
 * 
 * @property int $ID_KONFIRMASI_PENJUALAN
 * @property int $KODE_DEPO
 * @property int|null $ID_SALES_B
 * @property int|null $ID_OWNER
 * @property Carbon $TGL_KONFIRMASI_PENJUALAN
 * @property int $STATUS_KONFIRMASI_PENJUALAN
 * @property string|null $CATATAN
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Owner $owner
 * @property SalesB $sales_b
 * @property DepoAirMinum $depo_air_minum
 *
 * @package App\Models
 */
class KonfirmasiPenjualan extends Model
{
	protected $table = 'konfirmasi_penjualan';
	protected $primaryKey = 'ID_KONFIRMASI_PENJUALAN';

	protected $casts = [
		'KODE_DEPO' => 'int',
		'ID_SALES_B' => 'int',
		'ID_OWNER' => 'int',
		'STATUS_KONFIRMASI_PENJUALAN' => 'int'
	];

	protected $dates = [
		'TGL_KONFIRMASI_PENJUALAN'
	];

	protected $fillable = [
		'KODE_DEPO',
		'ID_SALES_B',
		'ID_OWNER',
		'TGL_KONFIRMASI_PENJUALAN',
		'STATUS_KONFIRMASI_PENJUALAN',
		'CATATAN'
	];

	public function owner()
	{
		return $this->belongsTo(Owner::class, 'ID_OWNER');
	}

	public function sales_b()
	{
		return $this->belongsTo(SalesB::class, 'ID_SALES_B');
	}

	public function depo_air_minum()
	{
		return $this->belongsTo(DepoAirMinum::class, 'KODE_DEPO');
	}
}
