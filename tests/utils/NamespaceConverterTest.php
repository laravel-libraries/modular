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

    public function testWithSlashesAlongSpaces()
    {
        $this->assertEquals(
            'This\\Is\\JustA\\Test\\For\\SPacEs',
            $this->toNamespace('this/is/just_a/test/for/s pac_es')
        );
    }
}
