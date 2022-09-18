<?php
namespace App\Enums;

use Illuminate\Support\Collection;

trait EnumToArray
{
    static public function values(): array
    {
        return array_map(fn ($case) => $case->value, self::cases());
    }

    static public function collectValues(): Collection
    {
        return new Collection(self::values());
    }

    static public function names(): array
    {
        return array_map(fn ($case) => $case->name, self::cases());
    }

    static public function collectNames(): Collection
    {
        return new Collection(self::names());
    }

    static public function toArray(): array
    {
        return array_reduce(self::cases(), function ($cases, $case) {
            $cases[$case->name] = $case->value;
            return $cases;
        }, []);
    }

    static public function toCollection(): Collection
    {
        return new Collection(self::toArray());
    }
}