<?php

namespace App\Service\Chat\Repository;

use App\Http\Requests\Chat\StoreRequest;
use App\Http\Requests\Chat\UpdateRequest;
use App\Models\Chat;
use Illuminate\Database\Eloquent\Collection;

interface ChatRepository
{
    public function getChats(): Collection;

    public function getChat(Chat $chat): Chat;

    public function store(StoreRequest $request): Chat;

    public function update(UpdateRequest $request, Chat $chat): Chat;

    public function destroy(Chat $chat): bool;

}
