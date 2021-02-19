<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Jabatan
 * 
 * @property int $KODE_JABATAN
 * @property string $NAMA_JABATAN
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Jabatan extends Model
{
	protected $table = 'jabatan';
	protected $primaryKey = 'KODE_JABATAN';

	protected $fillable = [
		'NAMA_JABATAN'
	];

	public function users()
	{
		return $this->hasMany(User::class, 'KODE_JABATAN');
	}
}
