<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class TelegramChannelService
{
    private $token;
    private $httpClient;

    public function __construct(string $token)
    {
        $this->token = $token;
        $this->httpClient = HttpClient::create();
    }

    public function sendMessage(int $channelUsername, string $message): void
    {
        $this->httpClient->request('POST', "https://api.telegram.org/bot{$this->token}/sendMessage", [
            'json' => [
                'chat_id' => $channelUsername,
                'text' => $message,
            ],
        ]);
    }

    public function sendPhoto(int $channelUsername, string $photo, string $message): void
    {
        $keyboard = json_encode([
            "inline_keyboard" => [
                [
                    [
                        "text" => "Bid",
                        "callback_data" => "1",
                        'url' => 'https://t.me/@kenerp_bot?variable1=value1&variable2=value2'
                    ],
                    [
                        "text" => "Mobile View",
                        "callback_data" => "2",
                        "url" => "t.me/Feshta_bot/feshta"
                    ],
                ]
            ]
        ]);

        $this->httpClient->request('POST', "https://api.telegram.org/bot{$this->token}/sendPhoto", [
            'json' => [
                'chat_id' => $channelUsername,
                'photo' => $photo,
                'caption' => $message,
                // 'has_spoiler' => TRUE,
                'reply_markup' => $keyboard
            ],
        ]);
    }
}
