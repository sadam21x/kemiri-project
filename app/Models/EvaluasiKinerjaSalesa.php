<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EvaluasiKinerjaSalesa
 * 
 * @property int $ID_EVALUASI_KINERJA_SALESA
 * @property int $ID_MANAJER_MARKETING
 * @property int $ID_SALES_A
 * @property int|null $ID_OWNER
 * @property Carbon $TGL_EVALUASI_KINERJA_SALESA
 * @property string $EVALUASI_SALESA
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ManajerMarketing $manajer_marketing
 * @property SalesA $sales_a
 * @property Owner $owner
 *
 * @package App\Models
 */
class EvaluasiKinerjaSalesa extends Model
{
	protected $table = 'evaluasi_kinerja_salesa';
	protected $primaryKey = 'ID_EVALUASI_KINERJA_SALESA';

	protected $casts = [
		'ID_MANAJER_MARKETING' => 'int',
		'ID_SALES_A' => 'int',
		'ID_OWNER' => 'int'
	];

	protected $dates = [
		'TGL_EVALUASI_KINERJA_SALESA'
	];

	protected $fillable = [
		'ID_MANAJER_MARKETING',
		'ID_SALES_A',
		'ID_OWNER',
		'TGL_EVALUASI_KINERJA_SALESA',
		'EVALUASI_SALESA'
	];

	public function manajer_marketing()
	{
		return $this->belongsTo(ManajerMarketing::class, 'ID_MANAJER_MARKETING');
	}

	public function sales_a()
	{
		return $this->belongsTo(SalesA::class, 'ID_SALES_A');
	}

	public function owner()
	{
		return $this->belongsTo(Owner::class, 'ID_OWNER');
	}
}
