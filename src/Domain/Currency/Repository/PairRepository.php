<?php

declare(strict_types=1);

namespace App\Domain\Currency\Repository;

use App\Domain\Currency\Collection\PairCollection;
use App\Domain\Currency\Entity\Pair;

interface PairRepository
{
    public function insert(Pair $pair): void;

    public function insertMany(PairCollection $pairs): void;

    public function empty(): void;
}