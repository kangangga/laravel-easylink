<?php

namespace Kangangga\EasylinkSdk\Dto;


class EasylinkUser
{
    public function __construct(
        public string $sn,
        public string $pin,
        public string $nama,
        public ?string $pwd,
        public ?string $rfid,
        public ?int $priv,
        public ?string $tmp,
    ) {
        //code goes here
    }

    public static function fromArray(array $data)
    {
        return new static(
            $data['sn'],
            $data['pin'],
            $data['nama'],
            $data['pwd'] ?? '0',
            $data['rfid'] ?? '',
            $data['priv'] ?? 0,
            $data['tmp'] ?? null,
        );
    }

    public function toArray()
    {
        return [
            'sn' => $this->sn,
            'pin' => $this->pin,
            'nama' => $this->nama,
            'pwd' => $this->pwd,
            'rfid' => $this->rfid,
            'priv' => $this->priv,
            'tmp' => $this->tmp,
        ];
    }
}
