<?php

namespace Kangangga\EasylinkSdk;

use Kangangga\EasylinkSdk\Dto\EasylinkUser;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\ConnectionException;
use Exception;

class EasylinkSdk
{
    /**
     * @var \Illuminate\Http\Client\PendingRequest
     */
    protected $http;

    public function __construct(
        protected string $host,
        protected string $serialNumber
    ) {
        // $host = "$host?sn=$serialNumber";
        // Fio616231022480092
        $this->http = Http::withUrlParameters([
            'sn' => $serialNumber
        ])
            ->retry(2, 500, function (Exception $exception, PendingRequest $request) {
                return $exception instanceof ConnectionException;
            })
            ->withHeaders([
                'Content-Type' => 'application/x-www-form-urlencoded'
            ])->baseUrl($host);
    }

    protected function request(string $path, array $payload = [])
    {
        $payload['sn'] = $this->serialNumber;
        $path = $path . "?" . http_build_query($payload, '', '&');
        return $this->http->post($path);
    }

    public function userSet(EasylinkUser $data)
    {
        $response = $this->request("/user/set", [
            'pin' => $data->pin,
            'nama' => $data->nama,
            'pwd' => $data->pwd,
            'rfid' => $data->rfid,
            'priv' => $data->priv,
            'tmp' => $data->tmp,
        ]);

        return $response->collect();
    }

    public function userDel()
    {
        $response = $this->request("/user/del");
        return $response->collect();
    }

    public function userAll()
    {
        // $response = $this->request("/user/all/paging");
        // return $response->collect();
    }

    public function device()
    {
        $response = $this->request("/dev/info");
        return $response->collect();
    }

    public function scanlogAll()
    {
        $response = $this->request("/scanlog/all/paging");
        $log = Storage::disk('local')->path(
            'attendance/' . now()->format('d_m_Y_H_i') . '.json'
        );

        $result = $response->collect();

        if ($result->get('Result')) {

            $data = collect($result->get('Data'))->map(function ($item) {
                $item['PIN'] = intval($item['PIN']);
                $item['nip'] = $item['PIN'];
                $item['date'] = $item['ScanDate'];
                return $item;
            });

            $result->put('Data', $data->toArray());

            if (File::exists($log)) {
                $logs = json_decode(File::get($log), true);
                $logs = array_merge($logs, $result->toArray());
                File::put($log, json_encode($logs));
            } else {
                File::put($log, json_encode($result->toArray()));
            }
        }

        return $result;
    }

    public function scanlogNew()
    {
        $response = $this->request("/scanlog/new");
        $log = Storage::disk('local')->path(
            'attendance/' . now()->format('d_m_Y_H_i') . '.json'
        );

        $result = $response->collect();

        if ($result->get('Result')) {

            $data = collect($result->get('Data'))->map(function ($item) {
                $item['PIN'] = intval($item['PIN']);
                $item['nip'] = $item['PIN'];
                $item['date'] = $item['ScanDate'];
                return $item;
            });

            $result->put('Data', $data->toArray());

            if (File::exists($log)) {
                $logs = json_decode(File::get($log), true);
                $logs = array_merge($logs, $result->toArray());
                File::put($log, json_encode($logs));
            } else {
                File::put($log, json_encode($result->toArray()));
            }
        }

        return $result;
    }

    public function setHost(string $value): static
    {
        $this->host = $value;
        return $this;
    }

    public function setSerialNumber(string $value): static
    {
        $this->serialNumber = $value;
        return $this;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    public static function make(
        string $host,
        string $serialNumber
    ) {
        return new static($host, $serialNumber);
    }

    private function getTemplate($pinT)
    {
        $header = "[";
        $footer = "]";
        $content = "";

        $dataGetTemps = tb_template::all()->where('pin', '=', $pinT); // mengambil data template sidik jari dan wajah

        foreach ($dataGetTemps as $dataGetTemp) {
            if ($content != "") {
                $content = $content . ',';
            }

            // Content atau parameter yang akan dikirim untuk upload data ke mesin
            $content = $content . '{"pin":"' . $dataGetTemp["pin"] . '","idx":"' . $dataGetTemp["finger_idx"] .
                '","alg_ver":"' . $dataGetTemp["alg_ver"] . '","template":"' . $dataGetTemp["template"] . '"}';
        }
        return ($header . $content . $footer); // Mengembalikan data yang telah diambil untuk diupload
    }
}
