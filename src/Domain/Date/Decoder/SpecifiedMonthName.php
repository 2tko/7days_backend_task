<?php

namespace Domain\Date\Decoder;

use DateTime;

class SpecifiedMonthName implements DecoderInterface
{
    public function getKey(): string
    {
        return 'specifiedMonthName';
    }

    public function decode(DateTime $date): string
    {
        return $date->format('F');
    }
}