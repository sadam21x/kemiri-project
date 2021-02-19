<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OperatorMesin
 * 
 * @property int $ID_OPERATOR_MESIN
 * @property string $KODE_KOTA
 * @property string $NAMA_OPERATOR_MESIN
 * @property string $ALAMAT_OPERATOR_MESIN
 * @property int $JENIS_KELAMIN_OPERATOR_MESIN
 * @property string|null $NO_TELP_OPERATOR_MESIN
 * @property string|null $EMAIL_OPERATOR_MESIN
 * @property string|null $FOTO_PROFILE
 * @property bool|null $STATUS_OPERATOR_MESIN
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IndonesiaCity $indonesia_city
 * @property Collection|PengambilanBahanBaku[] $pengambilan_bahan_bakus
 *
 * @package App\Models
 */
class OperatorMesin extends Model
{
	protected $table = 'operator_mesin';
	protected $primaryKey = 'ID_OPERATOR_MESIN';

	protected $casts = [
		'JENIS_KELAMIN_OPERATOR_MESIN' => 'int',
		'STATUS_OPERATOR_MESIN' => 'bool'
	];

	protected $fillable = [
		'KODE_KOTA',
		'NAMA_OPERATOR_MESIN',
		'ALAMAT_OPERATOR_MESIN',
		'JENIS_KELAMIN_OPERATOR_MESIN',
		'NO_TELP_OPERATOR_MESIN',
		'EMAIL_OPERATOR_MESIN',
		'FOTO_PROFILE',
		'STATUS_OPERATOR_MESIN'
	];

	public function indonesia_city()
	{
		return $this->belongsTo(IndonesiaCity::class, 'KODE_KOTA');
	}

	public function pengambilan_bahan_bakus()
	{
		return $this->hasMany(PengambilanBahanBaku::class, 'ID_OPERATOR_MESIN');
	}
}
