<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EvaluasiKinerjaSalesb
 * 
 * @property int $ID_EVALUASI_KINERJA_SALESB
 * @property int $ID_SALES_B
 * @property int $ID_MANAJER_MARKETING
 * @property int|null $ID_OWNER
 * @property Carbon $TGL_EVALUASI_KINERJA_SALESB
 * @property string $EVALUASI_SALESB
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ManajerMarketing $manajer_marketing
 * @property SalesB $sales_b
 * @property Owner $owner
 *
 * @package App\Models
 */
class EvaluasiKinerjaSalesb extends Model
{
	protected $table = 'evaluasi_kinerja_salesb';
	protected $primaryKey = 'ID_EVALUASI_KINERJA_SALESB';

	protected $casts = [
		'ID_SALES_B' => 'int',
		'ID_MANAJER_MARKETING' => 'int',
		'ID_OWNER' => 'int'
	];

	protected $dates = [
		'TGL_EVALUASI_KINERJA_SALESB'
	];

	protected $fillable = [
		'ID_SALES_B',
		'ID_MANAJER_MARKETING',
		'ID_OWNER',
		'TGL_EVALUASI_KINERJA_SALESB',
		'EVALUASI_SALESB'
	];

	public function manajer_marketing()
	{
		return $this->belongsTo(ManajerMarketing::class, 'ID_MANAJER_MARKETING');
	}

	public function sales_b()
	{
		return $this->belongsTo(SalesB::class, 'ID_SALES_B');
	}

	public function owner()
	{
		return $this->belongsTo(Owner::class, 'ID_OWNER');
	}
}
