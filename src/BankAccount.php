<?php

namespace Bibloos\Admiral;


class BankAccount
{
    protected $balance = 0;

    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function deposit($balance)
    {
        if($balance > 0 ){
            $this->setBalance($this->getBalance() + $balance);
        }else{
            throw new \Exception("You have to deposit a positive value");
        }
    }

    public function drawOut($balance)
    {
        $balanceCalculated = $this->getBalance() - $balance;
        if ( $balanceCalculated >= 0 ) {
            $this->setBalance($this->getBalance() - $balance);
        }else{
            throw new \Exception("You don't have money enough");
        }
        return $this->getBalance();
    }
}