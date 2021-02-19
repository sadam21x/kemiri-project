<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MetodeKirim
 * 
 * @property int $ID_METODE_KIRIM
 * @property string $METODE_KIRIM
 * 
 * @property Collection|Penjualan[] $penjualans
 *
 * @package App\Models
 */
class MetodeKirim extends Model
{
	protected $table = 'metode_kirim';
	protected $primaryKey = 'ID_METODE_KIRIM';
	public $timestamps = false;

	protected $fillable = [
		'METODE_KIRIM'
	];

	public function penjualans()
	{
		return $this->hasMany(Penjualan::class, 'ID_METODE_KIRIM');
	}
}
