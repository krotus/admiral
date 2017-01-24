<?php


namespace Bibloos\Admiral\tests;
use Bibloos\Admiral\User;

class UserTest extends \PHPUnit_Framework_TestCase
{

    public function testThatWeCanGetTheFirstName()
    {
        $sut = new User;
        $sut->setFirstName('Andreu');
        $this->assertEquals($sut->getFirstName(), 'Andreu');
    }

    public function testThatWeCanGetTheLastName()
    {
        $sut = new User;
        $sut->setLastName('Sala');
        $this->assertEquals($sut->getLastName(), 'Sala');

    }

    public function testFullNameIsReturned()
    {
        $sut = new User;
        $sut->setFirstName('Andreu');
        $sut->setLastName('Sala');

        $this->assertEquals($sut->getFullName(), 'Andreu Sala');
    }

    public function testFirstAndLastNameAreTrimmed()
    {
        $sut = new User;
        $sut->setFirstName(' Andreu  ');
        $sut->setLastName('   Sala   ');
        $this->assertEquals($sut->getFirstName(), 'Andreu');
        $this->assertEquals($sut->getLastName(), 'Sala');
    }

    public function testEmalAddressCanBeSet()
    {
        $sut = new User;
        $sut->setEmail('andreus.sala@gmail.com');
        $this->assertEquals($sut->getEmail(), 'andreus.sala@gmail.com');
    }

    public function testEmailVariablesContainCorrectValues()
    {
        $sut = new User;
        $sut->setFirstName('Andreu');
        $sut->setLastName('Sala');
        $sut->setEmail('andreus.sala@gmail.com');
        $emailVariables = $sut->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);
        $this->assertEquals($emailVariables['full_name'], 'Andreu Sala');
        $this->assertEquals($emailVariables['email'], 'andreus.sala@gmail.com');
    }

}