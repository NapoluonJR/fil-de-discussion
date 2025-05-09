<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    // Propriétés autorisées à être remplies
    protected $fillable = ['name', 'email', 'subject', 'message'];
}
