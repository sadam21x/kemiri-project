<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EvaluasiKinerjaSale
 * 
 * @property int $ID_EVALUASI_KINERJA_SALES
 * @property int $ID_PENJUALAN
 * @property Carbon $TGL_EVALUASI_KINERJA_SALES
 * @property string $EVALUASI_SALES_1
 * @property string $EVALUASI_SALES_2
 * 
 * @property Penjualan $penjualan
 *
 * @package App\Models
 */
class EvaluasiKinerjaSale extends Model
{
	protected $table = 'evaluasi_kinerja_sales';
	protected $primaryKey = 'ID_EVALUASI_KINERJA_SALES';
	public $timestamps = false;

	protected $casts = [
		'ID_PENJUALAN' => 'int'
	];

	protected $dates = [
		'TGL_EVALUASI_KINERJA_SALES'
	];

	protected $fillable = [
		'ID_PENJUALAN',
		'TGL_EVALUASI_KINERJA_SALES',
		'EVALUASI_SALES_1',
		'EVALUASI_SALES_2'
	];

	public function penjualan()
	{
		return $this->belongsTo(Penjualan::class, 'ID_PENJUALAN');
	}
}
