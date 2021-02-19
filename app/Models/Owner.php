<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Owner
 * 
 * @property int $ID_OWNER
 * @property string $KODE_KOTA
 * @property string $NAMA_OWNER
 * @property string $ALAMAT_OWNER
 * @property int $JENIS_KELAMIN_OWNER
 * @property string|null $NO_TELP_OWNER
 * @property string|null $EMAIL_OWNER
 * @property string|null $FOTO_PROFILE
 * @property bool|null $STATUS_OWNER
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IndonesiaCity $indonesia_city
 * @property Collection|DepoAirMinum[] $depo_air_minums
 * @property Collection|EvaluasiKinerjaSalesa[] $evaluasi_kinerja_salesas
 * @property Collection|EvaluasiKinerjaSalesb[] $evaluasi_kinerja_salesbs
 * @property Collection|KonfirmasiPenjualan[] $konfirmasi_penjualans
 * @property Collection|PembayaranPenerimaanBahanBaku[] $pembayaran_penerimaan_bahan_bakus
 * @property Collection|PembayaranPenjualan[] $pembayaran_penjualans
 * @property Collection|PenerimaanBahanBaku[] $penerimaan_bahan_bakus
 * @property Collection|PengambilanBahanBaku[] $pengambilan_bahan_bakus
 * @property Collection|Pengiriman[] $pengirimen
 * @property Collection|Penjualan[] $penjualans
 *
 * @package App\Models
 */
class Owner extends Model
{
	protected $table = 'owner';
	protected $primaryKey = 'ID_OWNER';

	protected $casts = [
		'JENIS_KELAMIN_OWNER' => 'int',
		'STATUS_OWNER' => 'bool'
	];

	protected $fillable = [
		'KODE_KOTA',
		'NAMA_OWNER',
		'ALAMAT_OWNER',
		'JENIS_KELAMIN_OWNER',
		'NO_TELP_OWNER',
		'EMAIL_OWNER',
		'FOTO_PROFILE',
		'STATUS_OWNER'
	];

	public function indonesia_city()
	{
		return $this->belongsTo(IndonesiaCity::class, 'KODE_KOTA');
	}

	public function depo_air_minums()
	{
		return $this->hasMany(DepoAirMinum::class, 'ID_OWNER');
	}

	public function evaluasi_kinerja_salesas()
	{
		return $this->hasMany(EvaluasiKinerjaSalesa::class, 'ID_OWNER');
	}

	public function evaluasi_kinerja_salesbs()
	{
		return $this->hasMany(EvaluasiKinerjaSalesb::class, 'ID_OWNER');
	}

	public function konfirmasi_penjualans()
	{
		return $this->hasMany(KonfirmasiPenjualan::class, 'ID_OWNER');
	}

	public function pembayaran_penerimaan_bahan_bakus()
	{
		return $this->hasMany(PembayaranPenerimaanBahanBaku::class, 'ID_OWNER');
	}

	public function pembayaran_penjualans()
	{
		return $this->hasMany(PembayaranPenjualan::class, 'ID_OWNER');
	}

	public function penerimaan_bahan_bakus()
	{
		return $this->hasMany(PenerimaanBahanBaku::class, 'ID_OWNER');
	}

	public function pengambilan_bahan_bakus()
	{
		return $this->hasMany(PengambilanBahanBaku::class, 'ID_OWNER');
	}

	public function pengirimen()
	{
		return $this->hasMany(Pengiriman::class, 'ID_OWNER');
	}

	public function penjualans()
	{
		return $this->hasMany(Penjualan::class, 'ID_OWNER');
	}
}
