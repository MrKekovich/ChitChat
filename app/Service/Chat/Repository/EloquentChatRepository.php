<?php

namespace App\Service\Chat\Repository;

use App\Http\Requests\Chat\StoreRequest;
use App\Http\Requests\Chat\UpdateRequest;
use App\Models\Chat;
use Illuminate\Database\Eloquent\Collection;

class EloquentChatRepository implements ChatRepository
{
    public function getChats(): Collection
    {
        return Chat::orderBy('id', 'desc')->get();
    }

    public function getChat(Chat $chat): Chat
    {
        return $chat;
    }

    public function store(StoreRequest $request): Chat
    {
        return Chat::firstOrCreate($request->validated());
    }

    public function update(UpdateRequest $request, Chat $chat): Chat
    {
        return tap($chat)->update($request->validated());
    }

    public function destroy(Chat $chat): bool
    {
        return $chat->delete();
    }
}
