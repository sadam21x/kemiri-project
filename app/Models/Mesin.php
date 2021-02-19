<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Mesin
 * 
 * @property int $KODE_MESIN
 * @property int $KODE_MOULDING
 * @property string $NAMA_MESIN
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Moulding $moulding
 * @property Collection|PengambilanBahanBaku[] $pengambilan_bahan_bakus
 *
 * @package App\Models
 */
class Mesin extends Model
{
	protected $table = 'mesin';
	protected $primaryKey = 'KODE_MESIN';

	protected $casts = [
		'KODE_MOULDING' => 'int'
	];

	protected $fillable = [
		'KODE_MOULDING',
		'NAMA_MESIN'
	];

	public function moulding()
	{
		return $this->belongsTo(Moulding::class, 'KODE_MOULDING');
	}

	public function pengambilan_bahan_bakus()
	{
		return $this->hasMany(PengambilanBahanBaku::class, 'KODE_MESIN');
	}
}
