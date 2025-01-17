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

namespace MacFJA\RediSearch\tests\Query\Builder;

use MacFJA\RediSearch\Exception\UnknownUnitException;
use MacFJA\RediSearch\Query\Builder\GeoFacet;

/**
 * @covers \MacFJA\RediSearch\Exception\UnknownUnitException
 * @covers \MacFJA\RediSearch\Query\Builder\GeoFacet
 *
 * @internal
 */
class GeoFacetTest extends \PHPUnit\Framework\TestCase
{
    public function testWrongUnit(): void
    {
        $this->expectException(UnknownUnitException::class);
        $this->expectExceptionMessage('The unit "foo" is not valid.');

        new GeoFacet(['foo'], 1.0, 1.0, 1.0, 'foo');
    }
}
