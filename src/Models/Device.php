<?php

namespace Kangangga\EasylinkSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Kangangga\EasylinkSdk\Traits\HasEasylinkConnection;

class Device extends Model
{
    use HasEasylinkConnection;

    protected $guarded = [];

    protected $table = 'device';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $primaryKey = 'sn';

    public $timestamps = false;
}
