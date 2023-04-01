<?php

namespace App\Http\Controllers;

use App\Http\Requests\Chat\UpdateRequest;
use App\Http\Requests\Message\StoreRequest;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function store(StoreRequest $request, Chat $chat)
    {
        $request['chat_id'] = $chat->id;
        $request['user_id'] = 1;
        return Message::create($request->validated())->toJson();
    }

    public function show(Message $message)
    {
        return $message->toJson();
    }

    public function update(UpdateRequest $request, Message $message)
    {
        return tap($message)->update($request->validated())->toJson();
    }

    public function destroy(Message $message)
    {
        return $message->delete();
    }
}
