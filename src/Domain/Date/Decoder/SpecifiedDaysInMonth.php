<?php

namespace Domain\Date\Decoder;

use DateTime;

class SpecifiedDaysInMonth implements DecoderInterface
{
    public function getKey(): string
    {
        return 'specifiedDaysInMonth';
    }

    public function decode(DateTime $date): string
    {
        return $date->format('t');
    }
}