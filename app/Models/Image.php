<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'url'
    ];
    public function messages(): BelongsToMany
    {
        return $this->belongsToMany(Message::class, 'message_image', 'image_id', 'message_id');
    }
}
