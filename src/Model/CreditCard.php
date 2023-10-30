<?php

namespace Haroldocurti\Comex\Model;

use Haroldocurti\Comex\Service\FakePaymentAPI;
use InvalidArgumentException;

class CreditCard implements Payment
{
    private string $issuedBy;

    public function __construct(
        private string $creditCardNum,
        private string $expDate,
        private string $ccr
    )

    {
        !$this->isCreditCardNumValid($this->creditCardNum)? throw new InvalidArgumentException() : $this->creditCardNum = $creditCardNum;
        $this->issuedBy=$this->getIssuer($this->creditCardNum);

    }

    public function getIssuedBy(): string
    {
        return $this->issuedBy;
    }

    public function getExpDate(): string
    {
        return $this->expDate;
    }

    public function getCcr(): string
    {
        return $this->ccr;
    }

    public function isCreditCardNumValid(string $creditCardNum): bool
    {
        // Remove any trash characters
        $creditCardNum = preg_replace('/\D/', '', $creditCardNum);

        // Check valid length (13 to 19 digits)
        $length = strlen($creditCardNum);
        if ($length < 13 || $length > 19) {
            return false;
        }

        //Luhn algorithm check
        $sum = 0;
        $otherNum = false;

        for ($i = $length - 1; $i >= 0; $i--) {
            $digit = (int)$creditCardNum[$i];

            if ($otherNum) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }

            $sum += $digit;
            $otherNum = !$otherNum;
        }

        return ($sum % 10 === 0);
    }

    function getIssuer($creditCardNumber): string {
        // Remove trash characters
        $creditCardNumber = preg_replace('/\D/', '', $creditCardNumber);

        // Issuers array.
        $issuerList = [
            'Visa' => '/^4\d{12}(\d{3})?$/',
            'MasterCard' => '/^5[1-5]\d{14}$/',
            'American Express' => '/^3[47]\d{13}$/',
            'Maestro' => '/^(50|5[6-8]|6[0-9])\d{12,19}$/',
             ];

        foreach ($issuerList as $issuer => $pattern) {
            if (preg_match($pattern, $creditCardNumber)) {
                return $issuer;
            }
        }
        return 'Not Found';
    }

    public function processPayment(float $totalSpent): bool
    {
        $ccInfo = [$this->creditCardNum, $this->expDate, $this->ccr, $totalSpent];
        $response = FakePaymentAPI::creditCardPaymentCheck($ccInfo);
        while ($response['response'] === 'TimedOut'){
            $response = FakePaymentAPI::creditCardPaymentCheck($ccInfo);
            echo "TimedOut" . PHP_EOL;
            echo "Trying again.".PHP_EOL;
            sleep(1);
        }
        if ($response['Processed'] == 0) echo "Insufficient Funds" . PHP_EOL;
        return !(($response['Processed'] == 0));

    }
    public function displayReceipt(): void
    {
        echo "Payment Ok!";
    }

}