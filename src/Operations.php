<?php

namespace src;

use Tkui\Widgets\Label;

class Operations
{
    public function __construct(
        private string $real
    ) {
        if (!is_numeric($this->real)) {
            return;
        }
    }
    public function transformarValoRealParaDolar(Label $labelComValorEmDolar): void
    {
        $labelComValorEmDolar->text = '$' . (string)round(
            ((float)$this->real / (float)(new AwesomeAPI())->contacaoDoDolarHoje()['high']),
            2
        );
    }
}
