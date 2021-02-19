<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Log
 * 
 * @property int $ID_USER_LOG
 * @property int $ID_JABATAN_LOG
 * @property int $ID_PEGAWAI
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Log extends Model
{
	protected $table = 'log';
	protected $primaryKey = 'ID_USER_LOG';

	protected $casts = [
		'ID_JABATAN_LOG' => 'int',
		'ID_PEGAWAI' => 'int'
	];

	protected $fillable = [
		'ID_JABATAN_LOG',
		'ID_PEGAWAI'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_USER_LOG');
	}
}
