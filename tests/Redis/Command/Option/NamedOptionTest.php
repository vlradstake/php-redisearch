<?php

declare(strict_types=1);

/*
 * Copyright MacFJA
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
 * Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
 * OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace MacFJA\RediSearch\tests\Redis\Command\Option;

use Generator;
use MacFJA\RediSearch\Redis\Command\Option\NamedOption;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MacFJA\RediSearch\Redis\Command\Option\NamedOption
 *
 * @uses \MacFJA\RediSearch\Redis\Command\Option\NamelessOption
 * @uses \MacFJA\RediSearch\Redis\Command\Option\AbstractCommandOption
 *
 * @internal
 */
class NamedOptionTest extends TestCase
{
    use BaseOptionTestTrait;

    public function testGetSetValue(): void
    {
        $option = new NamedOption('FOO');
        static::assertEquals(null, $option->getValue());
        $option->setValue('FOO');
        static::assertEquals('FOO', $option->getValue());
        $option->setValue('bar');
        static::assertEquals('bar', $option->getValue());
        $option->setValue(10);
        static::assertEquals(10, $option->getValue());
    }

    public function testGetName(): void
    {
        $option = new NamedOption('FOO');
        static::assertEquals('FOO', $option->getName());
        $option = new NamedOption('BAR');
        static::assertEquals('BAR', $option->getName());
    }

    public function dataProvider(string $testName): Generator
    {
        $defaultValueOption = new NamedOption('FOO');
        $withValueOption = new NamedOption('FOO', 'bar');

        switch ($testName) {
            case 'testGetOptionData':
                yield [$defaultValueOption, null];
                yield [$withValueOption, 'bar'];

                break;

            case 'testIsValid':
                yield [$defaultValueOption, false];
                yield [$withValueOption, true];

                break;

            case 'testRender':
                yield [$defaultValueOption, []];
                yield [$withValueOption, ['FOO', 'bar']];

                break;

            default:
                return;
        }
    }
}
