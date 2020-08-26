<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kotum
 * 
 * @property string $KODE_KOTA
 * @property string $KODE_PROVINSI
 * @property string $NAMA_KOTA
 * 
 * @property Provinsi $provinsi
 * @property Collection|AdminGudang[] $admin_gudangs
 * @property Collection|DepoAirMinum[] $depo_air_minums
 * @property Collection|ManajerMarketing[] $manajer_marketings
 * @property Collection|OperatorMesin[] $operator_mesins
 * @property Collection|Owner[] $owners
 * @property Collection|SalesA[] $sales_as
 * @property Collection|SalesB[] $sales_bs
 * @property Collection|Supplier[] $suppliers
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Kotum extends Model
{
	protected $table = 'kota';
	protected $primaryKey = 'KODE_KOTA';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'KODE_PROVINSI',
		'NAMA_KOTA'
	];

	public function provinsi()
	{
		return $this->belongsTo(Provinsi::class, 'KODE_PROVINSI');
	}

	public function admin_gudangs()
	{
		return $this->hasMany(AdminGudang::class, 'KODE_KOTA');
	}

	public function depo_air_minums()
	{
		return $this->hasMany(DepoAirMinum::class, 'KODE_KOTA');
	}

	public function manajer_marketings()
	{
		return $this->hasMany(ManajerMarketing::class, 'KODE_KOTA');
	}

	public function operator_mesins()
	{
		return $this->hasMany(OperatorMesin::class, 'KODE_KOTA');
	}

	public function owners()
	{
		return $this->hasMany(Owner::class, 'KODE_KOTA');
	}

	public function sales_as()
	{
		return $this->hasMany(SalesA::class, 'KODE_KOTA');
	}

	public function sales_bs()
	{
		return $this->hasMany(SalesB::class, 'KODE_KOTA');
	}

	public function suppliers()
	{
		return $this->hasMany(Supplier::class, 'KODE_KOTA');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'KODE_KOTA');
	}
}
