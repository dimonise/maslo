<?php

class Viber
{
    private $url_api = "https://chatapi.viber.com/pa/";

    private $token = "4ae3cacacce7dd9e-7368ba08447244b0-e6c3096f25f5a015";

    public function message_post
    (
        $from,          // ID администратора Public Account.
        array $sender,  // Данные отправителя.
        $text           // Текст.
    )
    {
        $data['from']   = $from;
        $data['sender'] = $sender;
        $data['type']   = 'text';
        $data['text']   = $text;
        return $this->call_api('post', $data);
    }

    private function call_api($method, $data)
    {
        $url = $this->url_api.$method;

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\nX-Viber-Auth-Token: ".$this->token."\r\n",
                'method'  => 'POST',
                'content' => json_encode($data)
            )
        );
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response);
    }
}
$Viber = new Viber();
$Viber->message_post(
    '01234567890A=',
    [
        'name' => 'Admin', // Имя отправителя. Максимум символов 28.
        'avatar' => 'http://avatar.example.com' // Ссылка на аватарку. Максимальный размер 100кб.
    ],
    'Test'
);