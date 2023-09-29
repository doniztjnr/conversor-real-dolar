<?php

namespace src;

class Moeda
{
    private string $url = 'https://economia.awesomeapi.com.br/last/USD-BRL';

    public function USDBRL()
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);
            $preparer = json_decode($output, true);

            return $preparer['USDBRL'];
        } catch (\Throwable $th) {
            echo $th->getMessage("API Moeda: Falha ao acessar end-point $this->url" . PHP_EOL);
        }
    }
}
