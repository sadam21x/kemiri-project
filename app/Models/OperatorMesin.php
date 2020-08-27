<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OperatorMesin
 * 
 * @property int $ID_OPERATOR_MESIN
 * @property string $KODE_KOTA
 * @property string $NAMA_OPERATOR_MESIN
 * @property string $ALAMAT_OPERATOR_MESIN
 * @property bool $JENIS_KELAMIN_OPERATOR_MESIN
 * @property string|null $NO_TELP_OPERATOR_MESIN
 * @property string|null $EMAIL_OPERATOR_MESIN
 * 
 * @property Kotum $kotum
 * @property Collection|PengambilanBahanBaku[] $pengambilan_bahan_bakus
 *
 * @package App\Models
 */
class OperatorMesin extends Model
{
	protected $table = 'operator_mesin';
	protected $primaryKey = 'ID_OPERATOR_MESIN';
	public $timestamps = false;

	protected $casts = [
		'JENIS_KELAMIN_OPERATOR_MESIN' => 'bool'
	];

	protected $fillable = [
		'KODE_KOTA',
		'NAMA_OPERATOR_MESIN',
		'ALAMAT_OPERATOR_MESIN',
		'JENIS_KELAMIN_OPERATOR_MESIN',
		'NO_TELP_OPERATOR_MESIN',
		'EMAIL_OPERATOR_MESIN'
	];

	public function kotum()
	{
		return $this->belongsTo(Kotum::class, 'KODE_KOTA');
	}

	public function pengambilan_bahan_bakus()
	{
		return $this->hasMany(PengambilanBahanBaku::class, 'ID_OPERATOR_MESIN');
	}
}
