<?php

namespace Kangangga\EasylinkSdk\Models;

use Kangangga\EasylinkSdk\Traits\PegawaiDetailAttribute;
use Kangangga\EasylinkSdk\Traits\HasEasylinkConnection;
use Illuminate\Database\Eloquent\Model;

class PegawaiDetail extends Model
{
    use HasEasylinkConnection,
        PegawaiDetailAttribute;

    protected $guarded = [];

    protected $table = 'pegawai_d';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $primaryKey = 'pegawai_id';

    public $timestamps = false;
}
