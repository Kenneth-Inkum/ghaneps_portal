<?php

namespace App\Models;

use Buildix\Timex\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'entity_name',
        'entity_type',
        'timex_event_id',
    ];

    /**
     * Get the Timex_event that owns the Entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function timexEvent(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the user that owns the Entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the participant for the Entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participant(): HasMany
    {
        return $this->hasMany(Participant::class);
    }
}
