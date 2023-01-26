<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'entity_id',
        'firstname',
        'lastname',
        'phone',
        'whatsapp_number',
        'email',
    ];
}
