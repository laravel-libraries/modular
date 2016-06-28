<?php

use LaraLibs\Modular\Commands\NamespaceConverterTrait;

class NamespaceConverterTest extends PHPUnit_Framework_TestCase
{
    use NamespaceConverterTrait;

    public function testSimple()
    {
        $this->assertEquals('Dome', $this->toNamespace('dome'));
    }

    public function testWithSpaces()
    {
        $this->assertEquals('GameOfThrones', $this->toNamespace('game of thrones'));
    }

    public function testWithSlashes()
    {
        $this->assertEquals(
            'Illuminate\\Support\\Facades',
            $this->toNamespace('illuminate/support/facades')
        );
    }
}
