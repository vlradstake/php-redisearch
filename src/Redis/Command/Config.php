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

namespace MacFJA\RediSearch\Redis\Command;

use MacFJA\RediSearch\Redis\Command\Option\CustomValidatorOption;
use MacFJA\RediSearch\Redis\Command\Option\NamelessOption;

/**
 * @method array<string,string>|string parseResponse(mixed $data)
 */
class Config extends AbstractCommand
{
    public function __construct(string $rediSearchVersion = self::MIN_IMPLEMENTED_VERSION)
    {
        parent::__construct([
            'action' => CustomValidatorOption::allowedValues(new NamelessOption(null, '>=2.0.0'), ['GET', 'HELP']),
            'option' => new NamelessOption(null, '>=2.0.0'),
        ], $rediSearchVersion);
    }

    public function setHelpMode(?string $optionName = null): self
    {
        $this->options['action']->setValue('HELP');
        $this->options['option']->setValue($optionName ?? '*');

        return $this;
    }

    public function setGetMode(?string $optionName = null): self
    {
        $this->options['action']->setValue('GET');
        $this->options['option']->setValue($optionName ?? '*');

        return $this;
    }

    public function getId(): string
    {
        return 'FT.CONFIG';
    }

    protected function getRequiredOptions(): array
    {
        return ['action', 'option'];
    }
}
