<?php

namespace App\Service\Chat;

use App\Http\Requests\Chat\StoreRequest;
use App\Http\Requests\Chat\UpdateRequest;
use App\Models\Chat;
use App\Service\Chat\Repository\ChatRepository;

class Service
{
    public ChatRepository $chatRepository;

    public function __construct(ChatRepository $chatRepository)
    {
        $this->chatRepository = $chatRepository;
    }

    public function getChat(Chat $chat)
    {
        $chat = $this->chatRepository->getChat($chat);
        $messages = $chat->messages;
        return [
            'chat' => $chat,
            'messages' => $chat->messages,
        ];
    }
}
