<?php

namespace Kangangga\EasylinkSdk\Models;

use Kangangga\EasylinkSdk\Traits\HasEasylinkConnection;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AttLog extends Model
{
    use HasEasylinkConnection;

    protected $guarded = [];

    protected $table = 'att_log';

    protected $casts = [
        'sync_at' => 'datetime',
    ];

    // public $timestamps = false;

    protected $primaryKey = 'att_log_id';

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'pin', 'nip');
    }

    public function sync()
    {
        // $this->where('pin', $this->pin)
        //     ->where('scan_date', $this->scan_date)
        //     ->update(['sync_at' => now()]);

        $this->sync_at = now();
        $this->save();
    }

    public function scopeIsHasSync($query)
    {
        return $query->whereNotNull('sync_at');
    }

    public function scopeIsNotSync($query)
    {
        return $query->whereNull('sync_at');
    }

    public function scopeWhereScanLog($query, $pin, $scan_date, $sn = null)
    {
        $q = $query
            ->when($sn, function ($query, $sn) {
                return $query->where('sn', $sn);
            })
            ->whereDate('scan_date', Carbon::parse($scan_date));

        if (is_array($pin)) {
            $q->whereIn('pin', $pin);
        } else {
            $q->where('pin', $pin);
        }

        return $q;
    }
}
