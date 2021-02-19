<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PenerimaanBahanBaku
 * 
 * @property int $ID_PENERIMAAN
 * @property int $ID_SUPPLIER
 * @property int $KODE_BAHAN_BAKU
 * @property int $ID_ADMIN_GUDANG
 * @property int|null $ID_OWNER
 * @property Carbon $TGL_KEDATANGAN
 * @property string $SATUAN
 * @property float $TOTAL_BERAT
 * @property float $JUMLAH_KARUNG_SAK
 * @property float $ISI_KARUNG
 * @property float $STOK_PENERIMAAN
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property AdminGudang $admin_gudang
 * @property Supplier $supplier
 * @property Owner $owner
 * @property BahanBaku $bahan_baku
 * @property Collection|DetailPengambilan[] $detail_pengambilans
 * @property Collection|PembayaranPenerimaanBahanBaku[] $pembayaran_penerimaan_bahan_bakus
 *
 * @package App\Models
 */
class PenerimaanBahanBaku extends Model
{
	protected $table = 'penerimaan_bahan_baku';
	protected $primaryKey = 'ID_PENERIMAAN';

	protected $casts = [
		'ID_SUPPLIER' => 'int',
		'KODE_BAHAN_BAKU' => 'int',
		'ID_ADMIN_GUDANG' => 'int',
		'ID_OWNER' => 'int',
		'TOTAL_BERAT' => 'float',
		'JUMLAH_KARUNG_SAK' => 'float',
		'ISI_KARUNG' => 'float',
		'STOK_PENERIMAAN' => 'float'
	];

	protected $dates = [
		'TGL_KEDATANGAN'
	];

	protected $fillable = [
		'ID_SUPPLIER',
		'KODE_BAHAN_BAKU',
		'ID_ADMIN_GUDANG',
		'ID_OWNER',
		'TGL_KEDATANGAN',
		'SATUAN',
		'TOTAL_BERAT',
		'JUMLAH_KARUNG_SAK',
		'ISI_KARUNG',
		'STOK_PENERIMAAN'
	];

	public function admin_gudang()
	{
		return $this->belongsTo(AdminGudang::class, 'ID_ADMIN_GUDANG');
	}

	public function supplier()
	{
		return $this->belongsTo(Supplier::class, 'ID_SUPPLIER');
	}

	public function owner()
	{
		return $this->belongsTo(Owner::class, 'ID_OWNER');
	}

	public function bahan_baku()
	{
		return $this->belongsTo(BahanBaku::class, 'KODE_BAHAN_BAKU');
	}

	public function detail_pengambilans()
	{
		return $this->hasMany(DetailPengambilan::class, 'ID_PENERIMAAN');
	}

	public function pembayaran_penerimaan_bahan_bakus()
	{
		return $this->hasMany(PembayaranPenerimaanBahanBaku::class, 'ID_PENERIMAAN');
	}
}
