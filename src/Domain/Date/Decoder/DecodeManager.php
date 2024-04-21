<?php

namespace Domain\Date\Decoder;

use DateTime;

class DecodeManager
{
    private array $decoders;

    public function __construct(array $decoders)
    {
        $this->decoders = $decoders;
    }

    public function decode(DateTime $date): array
    {
        $result = [];

        foreach ($this->decoders as $decoder) {
            if ($decoder instanceof DecoderInterface) {
                $result[$decoder->getKey()] = $decoder->decode($date);
            }
        }

        return $result;
    }
}