<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PengambilanBahanBaku
 * 
 * @property int $KODE_PENGAMBILAN_BAHAN_BAKU
 * @property int $ID_OPERATOR_MESIN
 * @property int|null $ID_OWNER
 * @property int $KODE_MESIN
 * @property Carbon $WAKTU_PENGAMBILAN
 * @property string $HASIL_PRODUK
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property OperatorMesin $operator_mesin
 * @property Owner $owner
 * @property Mesin $mesin
 * @property Collection|DetailPengambilan[] $detail_pengambilans
 * @property Collection|ProsesProduksi[] $proses_produksis
 *
 * @package App\Models
 */
class PengambilanBahanBaku extends Model
{
	protected $table = 'pengambilan_bahan_baku';
	protected $primaryKey = 'KODE_PENGAMBILAN_BAHAN_BAKU';

	protected $casts = [
		'ID_OPERATOR_MESIN' => 'int',
		'ID_OWNER' => 'int',
		'KODE_MESIN' => 'int'
	];

	protected $dates = [
		'WAKTU_PENGAMBILAN'
	];

	protected $fillable = [
		'ID_OPERATOR_MESIN',
		'ID_OWNER',
		'KODE_MESIN',
		'WAKTU_PENGAMBILAN',
		'HASIL_PRODUK'
	];

	public function operator_mesin()
	{
		return $this->belongsTo(OperatorMesin::class, 'ID_OPERATOR_MESIN');
	}

	public function owner()
	{
		return $this->belongsTo(Owner::class, 'ID_OWNER');
	}

	public function mesin()
	{
		return $this->belongsTo(Mesin::class, 'KODE_MESIN');
	}

	public function detail_pengambilans()
	{
		return $this->hasMany(DetailPengambilan::class, 'KODE_PENGAMBILAN');
	}

	public function proses_produksis()
	{
		return $this->hasMany(ProsesProduksi::class, 'KODE_PENGAMBILAN_BAHAN_BAKU');
	}
}
