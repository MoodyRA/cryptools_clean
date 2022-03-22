<?php

declare(strict_types=1);

namespace Cryptools\Domain\Entity;

class RecurringBuy
{
    protected int $id;
    protected Cryptocurrency $cryptocurrency;
    protected int $recurrence;
    protected string $hour;
    protected int $lastExecution;
}