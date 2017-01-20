<?php

namespace Bibloos\Admiral\tests;

use PHPUnit_Framework_TestCase;
use Bibloos\Admiral\BankAccount;


class BankAccountTest extends PHPUnit_Framework_TestCase
{
    public function testInitialBalanceIsZero()
    {
        $sut = new BankAccount();
        $this->assertEquals(0, $sut->getBalance());
    }

    public function testDrawOutBalanceCanNotBeNegative()
    {
        $sut = new BankAccount();
        try{
            $sut->drawOut(1);
        }catch(\Exception $e){
            $this->assertEquals(0, $sut->getBalance());
        }
    }

    public function testDepositBalanceIsPositiveValue()
    {
        $sut = new BankAccount();
        try{
            $sut->deposit(99);
        }catch(\Exception $e){
            $this->assertEquals(0, $sut->getBalance());
        }
    }


}