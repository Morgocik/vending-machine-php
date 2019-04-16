<?php


namespace VendingMachine;


use VendingMachine\VendingMachine;
use PHPUnit\Framework\TestCase;

class VendingMachineTest extends TestCase
{
    public function setUp()
    {
        $this->vendingMachine = new VendingMachine();
    }

    public function testCountCoins()
    {

        $this->assertEquals(0,  $this->vendingMachine->countCoins());
    }

    public function testIsCorectMoney()
    {
        $this->assertEquals( true , $this->vendingMachine->isCorectMoney('q'));

    }

    public function testAddMoney()
    {
        $this->assertEquals(true,  $this->vendingMachine->addMoney('s'));
    }


    /**
     * @dataProvider coinsProviderReturn
     * @param $inputCoins
     * @param $expectedCount
     */
    public function testReturnMoney($inputCoins, $expectedCount)
    {
        foreach ($inputCoins as $coin) {
            $this->vendingMachine->addMoney($coin);
        }
        $this->assertEquals($expectedCount,  $this->vendingMachine->returnMoney());
    }

    public function coinsProviderReturn()
    {
        return [
            [['s'], ['s']],
            [['s', 's'], ['s', 's']],
            [['s', 's', 'q'], ['s', 's', 'q']],
        ];
    }

    public function testIsCoinsTwo()
    {
        $this->vendingMachine->addMoney('s');
        $this->vendingMachine->addMoney('q');
        $this->assertEquals(2,  $this->vendingMachine->countCoins());
    }

    /**
     * @dataProvider coinsProvider
     * @param $inputCoins
     * @param $expectedCount
     */
    public function testManyCoins($inputCoins, $expectedCount)
    {
        foreach ($inputCoins as $coin) {
            $this->vendingMachine->addMoney($coin);
        }
        $this->assertEquals($expectedCount,  $this->vendingMachine->countCoins());
    }

    public function coinsProvider()
    {
        return [
            [['s'], 1],
            [['s', 's'], 2],
            [['s', 's', 's'], 3],
        ];
    }
}