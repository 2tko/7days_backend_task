<?php

namespace Domain\Date\Decoder;

use DateTime;

class TimezoneName implements DecoderInterface
{
    public function getKey(): string
    {
        return 'timezoneName';
    }

    public function decode(DateTime $date): string
    {
        return $date->getTimezone()->getName();
    }
}