<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JenisBahanBaku
 * 
 * @property int $ID_JENIS_BAHAN_BAKU
 * @property string $NAMA_JENIS_BAHAN_BAKU
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|BahanBaku[] $bahan_bakus
 *
 * @package App\Models
 */
class JenisBahanBaku extends Model
{
	protected $table = 'jenis_bahan_baku';
	protected $primaryKey = 'ID_JENIS_BAHAN_BAKU';

	protected $fillable = [
		'NAMA_JENIS_BAHAN_BAKU'
	];

	public function bahan_bakus()
	{
		return $this->hasMany(BahanBaku::class, 'ID_JENIS_BAHAN_BAKU');
	}
}
