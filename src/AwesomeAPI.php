<?php

namespace src;

class AwesomeAPI
{
    public function __construct(
        private string $url = 'https://economia.awesomeapi.com.br/last/USD-BRL',
    ) {
    }

    private function awesomeApiRequest(): string|bool
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    public function contacaoDoDolarHoje(): array
    {
        $decodeRequest = json_decode($this->awesomeApiRequest(), true);
        return $decodeRequest['USDBRL'];
    }
}
