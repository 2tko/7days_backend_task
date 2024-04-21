<?php

namespace Domain\Date\Decoder;

use DateTime;

class FebruaryDays implements DecoderInterface
{
    public function getKey(): string
    {
        return 'februaryDays';
    }

    public function decode(DateTime $date): string
    {
        return $date->setDate($date->format('Y'), 2, 1)->format('t');
    }
}