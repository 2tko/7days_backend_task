<?php

namespace Domain\Date\Decoder;

use DateTime;

class TimezoneOffset implements DecoderInterface
{
    public function getKey(): string
    {
        return 'timezoneOffset';
    }

    public function decode(DateTime $date): string
    {
        $timezoneOffset = $date->getOffset()/60;
        return ($date->getOffset()/60 >= 0 ? '+' : '-') . abs($timezoneOffset);
    }
}