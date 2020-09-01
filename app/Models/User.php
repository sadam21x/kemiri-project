<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $ID_USER
 * @property string $KODE_KOTA
 * @property int $KODE_JABATAN
 * @property string $USERNAME_USER
 * @property string $PASSWORD_USER
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
class User extends Model
{
	protected $table = 'user';
	protected $primaryKey = 'ID_USER';
	public $timestamps = false;

	protected $casts = [
		'KODE_JABATAN' => 'int',
		'JENIS_KELAMIN_USER' => 'int'
	];

	protected $fillable = [
		'KODE_KOTA',
		'KODE_JABATAN',
		'USERNAME_USER',
		'PASSWORD_USER',
		'NAMA_USER',
		'ALAMAT_USER',
		'JENIS_KELAMIN_USER',
		'NO_TELP_USER',
		'EMAIL_USER'
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
