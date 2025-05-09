<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['name'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function users()
    {
        return $this->hasManyThrough(
            \App\Models\User::class,
            \App\Models\Message::class,
            'channel_id', // Clé étrangère dans la table messages
            'id',         // Clé primaire de la table users
            'id',         // Clé locale sur la table channels
            'user_id'     // Clé étrangère dans la table messages
        )->distinct();
    }
}
