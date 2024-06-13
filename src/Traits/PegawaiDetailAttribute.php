<?php

namespace Kangangga\EasylinkSdk\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait PegawaiDetailAttribute
{
    public function gender(): Attribute
    {
        return new Attribute(
            get: function ($value) {
                return match ($value) {
                    1 => 'Laki-laki',
                    2 => 'Perempuan',
                    default => 'Laki-laki',
                };
            },
            set: function ($value) {
                return match ($value) {
                    'Laki-laki' => 1,
                    'Perempuan' => 2,
                    default => 1,
                };
            }
        );
    }

    public function hubungan(): Attribute
    {
        return new Attribute(
            get: function ($value) {
                return match ($value) {
                    0 => 'Tidak Ada',
                    1 => 'Keluarga',
                    2 => 'Pasangan',
                    3 => 'Saudara',
                    4 => 'Teman',
                    5 => 'Tetangga',
                    default => 'Lainnya',
                };
            },
            set: function ($value) {
                return match ($value) {
                    'Tidak Ada' => 0,
                    'Keluarga' => 1,
                    'Pasangan' => 2,
                    'Saudara' => 3,
                    'Teman' => 4,
                    'Tetangga' => 5,
                    'Lainnya' => 6,
                    default => 0,
                };
            }
        );
    }

    public function agama(): Attribute
    {
        return new Attribute(
            get: function ($value) {
                return match ($value) {
                    1 => 'Islam',
                    2 => 'Katolik',
                    3 => 'Protestan',
                    4 => 'Hindu',
                    5 => 'Budha',
                    6 => 'Lainnya',
                };
            },
            set: function ($value) {
                return match ($value) {
                    'Islam' => 1,
                    'Katolik' => 2,
                    'Protestan' => 3,
                    'Hindu' => 4,
                    'Budha' => 5,
                    default => 6,
                };
            }
        );
    }

    public function statNikah(): Attribute
    {
        return new Attribute(
            get: function ($value) {
                return match ($value) {
                    1 => 'Sudah Menikah',
                    2 => 'Belum Menikah',
                    3 => 'Duda/Janda Meninggal',
                    4 => 'Duda/Janda Cerai',
                    default => 'Sudah Menikah',
                };
            },
            set: function ($value) {
                return match ($value) {
                    'Sudah Menikah' => 1,
                    'Belum Menikah' => 2,
                    'Duda/Janda Meninggal' => 3,
                    'Duda/Janda Cerai' => 4,
                    default => 1,
                };
            }
        );
    }

    public function golDarah(): Attribute
    {
        return new Attribute(
            get: function ($value) {
                return match ($value) {
                    1 => 'A+',
                    2 => 'B+',
                    3 => 'O+',
                    4 => 'AB+',
                    5 => 'A-',
                    6 => 'B-',
                    7 => 'O-',
                    8 => 'AB-',
                    default => 'A+',
                };
            },
            set: function ($value) {
                return match ($value) {
                    'A+' => 1,
                    'B+' => 2,
                    'O+' => 3,
                    'AB+' => 4,
                    'A-' => 5,
                    'B-' => 6,
                    'O-' => 7,
                    'AB-' => 8,
                    default => 1,
                };
            }
        );
    }
}
