<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramBotController extends Controller
{

    public function __invoke()
    {
        $response = Telegram::sendMessage([
            'chat_id' => '-4079041421',
            'parse_mode' => 'html',
            'text' => "Dear <b>IT Team</b> \nNo tiket : <b>12948745</b> telah diselesaikan"
        ]);
        
        $messageId = $response->getMessageId();
        return $messageId;
    }
}
