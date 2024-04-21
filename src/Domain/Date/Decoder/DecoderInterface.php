<?php

namespace Domain\Date\Decoder;

use DateTime;

interface DecoderInterface
{
    public function getKey(): string;

    public function decode(DateTime $date): string;
}