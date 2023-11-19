<?php

namespace Haroldocurti\Comex\Test\Model;

use Haroldocurti\Comex\Model\CreditCard;
use Haroldocurti\Comex\Service\FakePaymentAPI;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CreditCardTest extends TestCase
{
    public function testValidCreditCardNumber()
    {
        $validCreditCardNum = '4111111111111111'; // A valid Visa card number
        $expDate = '12/25';
        $ccr = '123';

        $creditCard = new CreditCard($validCreditCardNum, $expDate, $ccr);
        $this->assertInstanceOf(CreditCard::class, $creditCard);
    }

    public function testInvalidCreditCardNumber()
    {
        $invalidCreditCardNum = '12345'; // An invalid card number

        $this->expectException(InvalidArgumentException::class);
        new CreditCard($invalidCreditCardNum, '12/25', '123');
    }

    public function testGetIssuer()
    {
        $validCreditCardNums = [
            '4111111111111111' => 'Visa',
            '5555555555554444' => 'MasterCard',
            '378282246310005' => 'American Express',
            '6759649826438453' => 'Maestro',
        ];

        foreach ($validCreditCardNums as $creditCardNum => $expectedIssuer) {
            $creditCard = new CreditCard($creditCardNum, '12/25', '123');
            $this->assertEquals($expectedIssuer, $creditCard->getIssuedBy());
        }
    }

    public function testProcessPaymentSuccess()
    {
        $validCreditCardNum = '4111111111111111'; // A valid Visa card number
        $expDate = '12/25';
        $ccr = '123';
        $totalSpent = 100.0;

        // Mock FakePaymentAPI to simulate a successful payment
        $fakePaymentAPI = $this->createMock(FakePaymentAPI::class);
        $fakePaymentAPI->method('creditCardPaymentChecknonStatic')
            ->willReturn(['Processed' => 1]);

        $creditCard = new CreditCard($validCreditCardNum, $expDate, $ccr);
        $this->assertTrue($creditCard->processPayment($totalSpent));
    }

    public function testProcessPaymentInsufficientFunds()
    {
        $validCreditCardNum = '4111111111111111'; // A valid Visa card number
        $expDate = '12/25';
        $ccr = '123';
        $totalSpent = 1000.0; // Amount that exceeds available funds

        // Mock FakePaymentAPI to simulate insufficient funds
        $fakePaymentAPI = $this->createMock(FakePaymentAPI::class);
        $fakePaymentAPI->method('creditCardPaymentChecknonStatic')
            ->willReturn(['Processed' => 0]);

        $creditCard = new CreditCard($validCreditCardNum, $expDate, $ccr);
        $this->assertFalse($creditCard->processPayment($totalSpent));
    }
}