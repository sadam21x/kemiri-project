<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Moulding
 * 
 * @property int $KODE_MOULDING
 * @property string $NAMA_MOULDING
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Mesin[] $mesins
 *
 * @package App\Models
 */
class Moulding extends Model
{
	protected $table = 'moulding';
	protected $primaryKey = 'KODE_MOULDING';

	protected $fillable = [
		'NAMA_MOULDING'
	];

	public function mesins()
	{
		return $this->hasMany(Mesin::class, 'KODE_MOULDING');
	}
}
