<?php

namespace App\Service\Watch;

use App\DTO\WatchDto;

interface WatchExternalSourceInterface
{
    public function retrieveById(int $id): ?WatchDto;
}
