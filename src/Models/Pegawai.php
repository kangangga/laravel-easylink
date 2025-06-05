<?php

namespace Kangangga\EasylinkSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Kangangga\EasylinkSdk\Traits\HasEasylinkConnection;

class Pegawai extends Model
{
    use HasEasylinkConnection;

    protected $guarded = [];

    protected $table = 'pegawai';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $primaryKey = 'pegawai_id';

    public $timestamps = false;

    public function detail()
    {
        return $this->hasOne(PegawaiDetail::class, 'pegawai_id', 'pegawai_id');
    }
}
