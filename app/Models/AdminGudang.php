<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminGudang
 * 
 * @property int $ID_ADMIN_GUDANG
 * @property string $KODE_KOTA
 * @property string $NAMA_ADMIN_GUDANG
 * @property string $ALAMAT_ADMIN_GUDANG
 * @property int $JENIS_KELAMIN_ADMIN_GUDANG
 * @property string|null $NO_TELP_ADMIN_GUDANG
 * @property string|null $EMAIL_ADMIN_GUDANG
 * @property string|null $FOTO_PROFILE
 * @property bool|null $STATUS_ADMIN_GUDANG
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IndonesiaCity $indonesia_city
 * @property Collection|PenerimaanBahanBaku[] $penerimaan_bahan_bakus
 * @property Collection|Pengiriman[] $pengirimen
 *
 * @package App\Models
 */
class AdminGudang extends Model
{
	protected $table = 'admin_gudang';
	protected $primaryKey = 'ID_ADMIN_GUDANG';

	protected $casts = [
		'JENIS_KELAMIN_ADMIN_GUDANG' => 'int',
		'STATUS_ADMIN_GUDANG' => 'bool'
	];

	protected $fillable = [
		'KODE_KOTA',
		'NAMA_ADMIN_GUDANG',
		'ALAMAT_ADMIN_GUDANG',
		'JENIS_KELAMIN_ADMIN_GUDANG',
		'NO_TELP_ADMIN_GUDANG',
		'EMAIL_ADMIN_GUDANG',
		'FOTO_PROFILE',
		'STATUS_ADMIN_GUDANG'
	];

	public function indonesia_city()
	{
		return $this->belongsTo(IndonesiaCity::class, 'KODE_KOTA');
	}

	public function penerimaan_bahan_bakus()
	{
		return $this->hasMany(PenerimaanBahanBaku::class, 'ID_ADMIN_GUDANG');
	}

	public function pengirimen()
	{
		return $this->hasMany(Pengiriman::class, 'ID_ADMIN_GUDANG');
	}
}
