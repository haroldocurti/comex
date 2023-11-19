<?php

namespace Haroldocurti\Comex\Service;

class FakePaymentAPI
{
 public static function creditCardPaymentCheck(array $transactionInfo):array
 {
     $apiFakeTimeToRespond = rand(1,10);
     $fakeFundsCheck = rand(0,1);
     for ($i = 0; $i < $apiFakeTimeToRespond; $i++) {
         echo ".";
         sleep(1);
     }
     if ($apiFakeTimeToRespond > 5){
         return $return = [
           'response'=>'TimedOut',
           'Processed'=> 0
         ];

     }
     return $return = [
         'response'=> 'Ok',
         'Processed' => $fakeFundsCheck
     ];
 }
    public function creditCardPaymentChecknonStatic(array $transactionInfo):array
    {
        $apiFakeTimeToRespond = rand(1,10);
        $fakeFundsCheck = rand(0,1);
        for ($i = 0; $i < $apiFakeTimeToRespond; $i++) {
            echo ".";
            sleep(1);
        }
        if ($apiFakeTimeToRespond > 5){
            return $return = [
                'response'=>'TimedOut',
                'Processed'=> 0
            ];

        }
        return $return = [
            'response'=> 'Ok',
            'Processed' => $fakeFundsCheck
        ];
    }
}