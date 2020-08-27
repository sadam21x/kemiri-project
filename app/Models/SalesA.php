<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesA
 * 
 * @property int $ID_SALES_A
 * @property string $KODE_KOTA
 * @property string $NAMA_SALES_A
 * @property string $ALAMAT_SALES_A
 * @property bool $JENIS_KELAMIN_SALES_A
 * @property string $NO_TELP_SALES_A
 * @property string|null $EMAIL_SALES_A
 * 
 * @property Kotum $kotum
 * @property Collection|DepoAirMinum[] $depo_air_minums
 *
 * @package App\Models
 */
class SalesA extends Model
{
	protected $table = 'sales_a';
	protected $primaryKey = 'ID_SALES_A';
	public $timestamps = false;

	protected $casts = [
		'JENIS_KELAMIN_SALES_A' => 'bool'
	];

	protected $fillable = [
		'KODE_KOTA',
		'NAMA_SALES_A',
		'ALAMAT_SALES_A',
		'JENIS_KELAMIN_SALES_A',
		'NO_TELP_SALES_A',
		'EMAIL_SALES_A'
	];

	public function kotum()
	{
		return $this->belongsTo(Kotum::class, 'KODE_KOTA');
	}

	public function depo_air_minums()
	{
		return $this->hasMany(DepoAirMinum::class, 'ID_SALES_A');
	}
}
