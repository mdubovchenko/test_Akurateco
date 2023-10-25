<?php

declare(strict_types=1);

class PaymentService
{
    public function prepareDate(Order $order): array
    {
        return [
            'action' => 'SALE',
            'client_key' => Config::getKey(),
            'order_id' => $order->getId(),
            'order_amount' => $order->getAmount(),
            'order_currency' => $order->getCurrency(),
            'order_description' => $order->getDescription(),
            'card_number' => $_POST['card_number'],
            'card_exp_month' => $_POST['card_exp_month'],
            'card_exp_year' => $_POST['card_exp_year'],
            'card_cvv2' => $_POST['card_cvv2'],
            'payer_first_name' => $_POST['payer_first_name'],
            'payer_last_name' => $_POST['payer_last_name'],
            'payer_address' => $_POST['payer_address'],
            'payer_country' => $_POST['payer_country'],
            'payer_city' => $_POST['payer_city'],
            'payer_zip' => $_POST['payer_zip'],
            'payer_email' => $_POST['payer_email'],
            'payer_phone' => $_POST['payer_phone'],
            'payer_ip' => $_SERVER['REMOTE_ADDR'],
            'term_url_3ds' => 'http://client.site.com/return.php',
            'hash' => $this->getHash($_POST['payer_email'], Config::getPass(), $_POST['card_number']),
        ];
    }

    public function sendRequest(string $url, array $data): mixed
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->createHeaders());
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(
            $data,
            JSON_UNESCAPED_UNICODE
        ));

        $curlExec = curl_exec($ch);
        $error = '';
        if (curl_errno($ch)) {
            $error = curl_error($ch);
        }
        curl_close($ch);

        $result = json_decode($curlExec, true);

        if ($error) {
            throw new RuntimeException('Something went wrong');
        }

        return $result;
    }

    private function createHeaders(): array
    {
        return [
            'Content-Type: application/json',
            'accept: */*',
        ];
    }


    private function getHash(string $email, string $pass, string $cardNumber): string
    {
        return md5(
            strtoupper(
                strrev($email) . $pass . strrev(substr($cardNumber,0,6) . substr($cardNumber,-4))
            )
        );
    }
}
