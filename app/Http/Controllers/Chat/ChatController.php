<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\StoreRequest;
use App\Http\Requests\Chat\UpdateRequest;
use App\Models\Chat;

class ChatController extends BaseController
{
    public function index()
    {
        $chats = $this->service->chatRepository->getChats();
        return $chats->toJson();
    }

    public function store(StoreRequest $request)
    {
    }

    public function show(Chat $chat)
    {
        return $this->service->getChat($chat);
    }

    public function update(UpdateRequest $request, Chat $chat)
    {
        $chat = $this->service->chatRepository->getChat($chat);
        return $chat->toJson();
    }

    public function destroy(Chat $chat)
    {
        return $this->service->chatRepository->destroy($chat);

    }
}
