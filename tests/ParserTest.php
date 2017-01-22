<?php

namespace Bibloos\Admiral\tests;

use PHPUnit_Framework_TestCase;
use Bibloos\Admiral\Parser;


class ParserTest extends PHPUnit_Framework_TestCase{

    public function providerParserCheckStringReturnsTrue()
    {
        return [
            [""],
            ["asdf"],
            ["()"],
            ["(())"],
            ["(((())))"],
            ["(asdf)a()"],
            ["()=汉语; 漢語=()"]
        ];
    }

    public function providerParserCheckStringReturnsFalse()
    {
        return [
            [")("],
            ["))(("],
            ["(()="],
            ["(()))"],
            ["(())(()"],
            ["(asdf))a())"],
            ['汉语; 漢語)'],
        ];
    }

    /**
     * @dataProvider providerParserCheckStringReturnsTrue
     */
    public function testSetCheckFunctionOnValidString($string)
    {
        $sut = $this->getParser();
        $true = $sut->check($string);
        $this->assertTrue($true);
    }

    /**
     * @dataProvider providerParserCheckStringReturnsFalse
     */
    public function testSetCheckFunctionOnInValidString($string)
    {
        $sut = $this->getParser();
        $false = $sut->check($string);
        $this->assertFalse($false);
    }

    public function testParserCreationReturnsProperType()
    {
        $sut = $this->getParser();
        $this->assertInstanceOf('Bibloos\Admiral\Parser', $sut);
    }


    public function testParserFunctionCheckReceiveInvalidArgument()
    {
        $sut = $this->getParser();
        $valid = $sut->check(123);
        $this->assertFalse($valid);
    }

    public function getParser(){
        return new Parser();
    }


}