<?php

namespace Kangangga\EasylinkSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Kangangga\EasylinkSdk\Traits\HasEasylinkConnection;

class DevType extends Model
{
    use HasEasylinkConnection;

    protected $guarded = [];

    protected $table = 'dev_type';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $primaryKey = 'id_type';

    public $timestamps = false;
}
