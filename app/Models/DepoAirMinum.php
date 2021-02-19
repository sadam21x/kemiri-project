<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DepoAirMinum
 * 
 * @property int $KODE_DEPO
 * @property string $KODE_KOTA
 * @property int|null $ID_SALES_A
 * @property int|null $ID_SALES_B
 * @property int|null $ID_MANAJER_MARKETING
 * @property int|null $ID_OWNER
 * @property string $NAMA_CUSTOMER
 * @property string $NAMA_DEPO
 * @property string|null $ALAMAT_DEPO
 * @property string|null $NO_TELP_DEPO
 * @property string|null $EMAIL_DEPO
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IndonesiaCity $indonesia_city
 * @property SalesA $sales_a
 * @property ManajerMarketing $manajer_marketing
 * @property SalesB $sales_b
 * @property Owner $owner
 * @property Collection|KonfirmasiPenjualan[] $konfirmasi_penjualans
 * @property Collection|Penjualan[] $penjualans
 *
 * @package App\Models
 */
class DepoAirMinum extends Model
{
	protected $table = 'depo_air_minum';
	protected $primaryKey = 'KODE_DEPO';

	protected $casts = [
		'ID_SALES_A' => 'int',
		'ID_SALES_B' => 'int',
		'ID_MANAJER_MARKETING' => 'int',
		'ID_OWNER' => 'int'
	];

	protected $fillable = [
		'KODE_KOTA',
		'ID_SALES_A',
		'ID_SALES_B',
		'ID_MANAJER_MARKETING',
		'ID_OWNER',
		'NAMA_CUSTOMER',
		'NAMA_DEPO',
		'ALAMAT_DEPO',
		'NO_TELP_DEPO',
		'EMAIL_DEPO'
	];

	public function indonesia_city()
	{
		return $this->belongsTo(IndonesiaCity::class, 'KODE_KOTA');
	}

	public function sales_a()
	{
		return $this->belongsTo(SalesA::class, 'ID_SALES_A');
	}

	public function manajer_marketing()
	{
		return $this->belongsTo(ManajerMarketing::class, 'ID_MANAJER_MARKETING');
	}

	public function sales_b()
	{
		return $this->belongsTo(SalesB::class, 'ID_SALES_B');
	}

	public function owner()
	{
		return $this->belongsTo(Owner::class, 'ID_OWNER');
	}

	public function konfirmasi_penjualans()
	{
		return $this->hasMany(KonfirmasiPenjualan::class, 'KODE_DEPO');
	}

	public function penjualans()
	{
		return $this->hasMany(Penjualan::class, 'KODE_DEPO');
	}
}
