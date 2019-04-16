<?php

namespace VendingMachine;

class VendingMachine
{
    const NICKEL = 'N';
    const DIME = 'D';
    const QUARTER = 'Q';
    const DOLLAR = 'S';

    const ACCEPT_MONEY = [
        self::NICKEL,
        self::DIME,
        self::QUARTER,
        self::DOLLAR
        ];

    private $coins = [];

    public function countCoins()
    {
        return count($this->coins);
    }

    public function isCorectMoney(string $money)
    {

        return in_array(strtoupper($money), self::ACCEPT_MONEY);
    }

    public function addMoney(string $money)
    {
        if ( $this->isCorectMoney($money)) {
            $this->coins[] = $money;
            return true;
        }
        return false;
    }

    public function returnMoney()
    {
        return $this->coins;
    }
}
