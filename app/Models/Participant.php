<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    /**
     * Get the Entity that owns the Participant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Entity(): BelongsTo
    {
        return $this->belongsTo(Entity::class);
    }
}
