<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property int $ID_USER
 * @property string $KODE_KOTA
 * @property int $KODE_JABATAN
 * @property string $username
 * @property string $password
 * @property string $NAMA_USER
 * @property string $ALAMAT_USER
 * @property int $JENIS_KELAMIN_USER
 * @property string|null $NO_TELP_USER
 * @property string $EMAIL_USER
 * 
 * @property IndonesiaCity $indonesia_city
 * @property Jabatan $jabatan
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	protected $table = 'user';
	protected $primaryKey = 'ID_USER';

	protected $casts = [
		'KODE_JABATAN' => 'int'
	];

	protected $fillable = [
		'KODE_JABATAN',
		'username',
		'password',
	];

	public function indonesia_city()
	{
		return $this->belongsTo(IndonesiaCity::class, 'KODE_KOTA');
	}

	public function jabatan()
	{
		return $this->belongsTo(Jabatan::class, 'KODE_JABATAN');
	}
}
