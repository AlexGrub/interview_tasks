<?php

class PaymentProcessor {
    public function processPayment($paymentType, $amount) {
        if ($paymentType == 'credit_card') {
            // Обработка платежа по кредитной карте
            return $this->processCreditCardPayment($amount);
        } elseif ($paymentType == 'paypal') {
            // Обработка платежа через PayPal
            return $this->processPaypalPayment($amount);
        } elseif ($paymentType == 'bitcoin') {
            // Обработка платежа через Bitcoin
            return $this->processBitcoinPayment($amount);
        } else {
            throw new \Exception('Неподдерживаемый тип оплаты');
        }
    }

    private function processCreditCardPayment($amount) {
        // Логика обработки платежа по кредитной карте
        return "Платеж по кредитной карте на сумму $amount успешно обработан.";
    }

    private function processPaypalPayment($amount) {
        // Логика обработки платежа через PayPal
        return "Платеж через PayPal на сумму $amount успешно обработан.";
    }

    private function processBitcoinPayment($amount) {
        // Логика обработки платежа через Bitcoin
        return "Платеж через Bitcoin на сумму $amount успешно обработан.";
    }
}

// Пример использования
$paymentProcessor = new PaymentProcessor();
$result = $paymentProcessor->processPayment('credit_card', 100);
echo $result;
