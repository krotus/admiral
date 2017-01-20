<?php

namespace Bibloos\Admiral\tests;

use PHPUnit_Framework_TestCase;
use Bibloos\Admiral\Parser;


class ParserTest extends PHPUnit_Framework_TestCase{

    public function testTrueIsTrue()
    {
        $sut = true;
        $this->assertTrue($sut);
    }

    public function testParserCreationReturnsProperType()
    {
        $sut = new Parser();
        $this->assertInstanceOf('Bibloos\Admiral\Parser', $sut);
    }

    public function testParserCheckParenthesesOpenedAnotherParenthesesIsClosed()
    {
        $sut = new Parser();
        $valid = $sut->check('(asdf)');
        $this->assertTrue($valid);
    }

    public function testParserCheckOrderOfParenthesesReturnsFalse()
    {
        $sut = new Parser();
        $valid = $sut->check(')(');
        $this->assertFalse($valid);
    }

    public function testParserCheckOrderOfParenthesesReturnsTrue()
    {
        $sut = new Parser();
        $valid = $sut->check('(())');
        $this->assertTrue($valid);
    }

    public function testParserFunctionCheckReceiveStringAsArgument()
    {
        $sut = new Parser();
        $valid = $sut->check('asdf');
        $this->assertTrue($valid);
    }

    public function testParserFunctionCheckReceiveInvalidArgument()
    {
        $sut = new Parser();
        $valid = $sut->check(123);
        $this->assertFalse($valid);
    }


}