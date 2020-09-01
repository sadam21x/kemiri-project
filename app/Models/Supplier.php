<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 * 
 * @property int $ID_SUPPLIER
 * @property string $KODE_KOTA
 * @property string $NAMA_SUPPLIER
 * @property string $ALAMAT_SUPPLIER
 * @property string $NO_TELP_SUPPLIER
 * @property string|null $EMAIL_SUPPLIER
 * 
 * @property Kotum $kotum
 * @property Collection|PenerimaanBahanBaku[] $penerimaan_bahan_bakus
 *
 * @package App\Models
 */
class Supplier extends Model
{
	protected $table = 'supplier';
	protected $primaryKey = 'ID_SUPPLIER';
	public $timestamps = false;

	protected $fillable = [
		'KODE_KOTA',
		'NAMA_SUPPLIER',
		'ALAMAT_SUPPLIER',
		'NO_TELP_SUPPLIER',
		'EMAIL_SUPPLIER'
	];

	public function kotum()
	{
		return $this->belongsTo(Kotum::class, 'KODE_KOTA');
	}

	public function penerimaan_bahan_bakus()
	{
		return $this->hasMany(PenerimaanBahanBaku::class, 'ID_SUPPLIER');
	}
}
