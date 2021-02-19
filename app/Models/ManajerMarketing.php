<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ManajerMarketing
 * 
 * @property int $ID_MANAJER_MARKETING
 * @property string $KODE_KOTA
 * @property string $NAMA_MANAJER_MARKETING
 * @property string $ALAMAT_MANAJER_MARKETING
 * @property int $JENIS_KELAMIN_MANAJER_MARKETING
 * @property string|null $NO_TELP_MANAJER_MARKETING
 * @property string|null $EMAIL_MANAJER_MARKETING
 * @property string|null $FOTO_PROFILE
 * @property bool|null $STATUS_MANAGER_MARKETING
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IndonesiaCity $indonesia_city
 * @property Collection|DepoAirMinum[] $depo_air_minums
 * @property Collection|EvaluasiKinerjaSalesa[] $evaluasi_kinerja_salesas
 * @property Collection|EvaluasiKinerjaSalesb[] $evaluasi_kinerja_salesbs
 * @property Collection|Penjualan[] $penjualans
 *
 * @package App\Models
 */
class ManajerMarketing extends Model
{
	protected $table = 'manajer_marketing';
	protected $primaryKey = 'ID_MANAJER_MARKETING';

	protected $casts = [
		'JENIS_KELAMIN_MANAJER_MARKETING' => 'int',
		'STATUS_MANAGER_MARKETING' => 'bool'
	];

	protected $fillable = [
		'KODE_KOTA',
		'NAMA_MANAJER_MARKETING',
		'ALAMAT_MANAJER_MARKETING',
		'JENIS_KELAMIN_MANAJER_MARKETING',
		'NO_TELP_MANAJER_MARKETING',
		'EMAIL_MANAJER_MARKETING',
		'FOTO_PROFILE',
		'STATUS_MANAGER_MARKETING'
	];

	public function indonesia_city()
	{
		return $this->belongsTo(IndonesiaCity::class, 'KODE_KOTA');
	}

	public function depo_air_minums()
	{
		return $this->hasMany(DepoAirMinum::class, 'ID_MANAJER_MARKETING');
	}

	public function evaluasi_kinerja_salesas()
	{
		return $this->hasMany(EvaluasiKinerjaSalesa::class, 'ID_MANAJER_MARKETING');
	}

	public function evaluasi_kinerja_salesbs()
	{
		return $this->hasMany(EvaluasiKinerjaSalesb::class, 'ID_MANAJER_MARKETING');
	}

	public function penjualans()
	{
		return $this->hasMany(Penjualan::class, 'ID_MANAJER_MARKETING');
	}
}
