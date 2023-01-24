<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'entity_name_id',
        'firstname',
        'lastname',
        'phone',
        'whatsapp_number',
        'email',
        'session',
    ];

}
