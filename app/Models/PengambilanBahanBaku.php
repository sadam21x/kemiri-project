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
 * @property int $ID_PENERIMAAN
 * @property int $ID_OPERATOR_MESIN
 * @property int $KODE_MESIN
 * @property Carbon $WAKTU_PENGAMBILAN
 * @property float $JUMLAH_KG
 * @property float $JUMLAH_SAK_KARUNG
 * @property bool $STATUS_BAHAN_BAKU
 * 
 * @property OperatorMesin $operator_mesin
 * @property Mesin $mesin
 * @property PenerimaanBahanBaku $penerimaan_bahan_baku
 * @property Collection|ProsesProduksi[] $proses_produksis
 *
 * @package App\Models
 */
class PengambilanBahanBaku extends Model
{
	protected $table = 'pengambilan_bahan_baku';
	protected $primaryKey = 'KODE_PENGAMBILAN_BAHAN_BAKU';
	public $timestamps = false;

	protected $casts = [
		'ID_PENERIMAAN' => 'int',
		'ID_OPERATOR_MESIN' => 'int',
		'KODE_MESIN' => 'int',
		'JUMLAH_KG' => 'float',
		'JUMLAH_SAK_KARUNG' => 'float',
		'STATUS_BAHAN_BAKU' => 'bool'
	];

	protected $dates = [
		'WAKTU_PENGAMBILAN'
	];

	protected $fillable = [
		'ID_PENERIMAAN',
		'ID_OPERATOR_MESIN',
		'KODE_MESIN',
		'WAKTU_PENGAMBILAN',
		'JUMLAH_KG',
		'JUMLAH_SAK_KARUNG',
		'STATUS_BAHAN_BAKU'
	];

	public function operator_mesin()
	{
		return $this->belongsTo(OperatorMesin::class, 'ID_OPERATOR_MESIN');
	}

	public function mesin()
	{
		return $this->belongsTo(Mesin::class, 'KODE_MESIN');
	}

	public function penerimaan_bahan_baku()
	{
		return $this->belongsTo(PenerimaanBahanBaku::class, 'ID_PENERIMAAN');
	}

	public function proses_produksis()
	{
		return $this->hasMany(ProsesProduksi::class, 'KODE_PENGAMBILAN_BAHAN_BAKU');
	}
}
