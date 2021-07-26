<?php

declare(strict_types=1);

namespace Iso3166Test\Part2;

use Iso3166\Part2\CountryName;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

use function ctype_upper;
use function is_string;
use function str_replace;

class CountryNameTest extends TestCase
{
    /**
     * @test
     */
    public function constantValuesAreString()
    {
        $reflectionClass = new ReflectionClass(CountryName::class);
        $values          = $reflectionClass->getConstants();

        foreach ($values as $value) {
            $this->assertTrue(is_string($value));
        }
    }

    /**
     * @test
     */
    public function constantKeysAreUpperCase()
    {
        $reflectionClass = new ReflectionClass(CountryName::class);
        $values          = $reflectionClass->getConstants();

        foreach ($values as $key => $value) {
            $keyWithoutUnderscore = str_replace('_', '', $key);

            $this->assertTrue(ctype_upper($keyWithoutUnderscore));
        }
    }
}
