<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntityName extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'entity_category_id',
        'entity_name',
    ];

    /**
     * Get the user that owns the EntityName
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

        /**
     * Get the entityCategory that owns the EntityName
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entityCategory(): BelongsTo
    {
        return $this->belongsTo(EntityCategory::class);
    }

    /**
     * Get all of the participant for the EntityName
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participant(): HasMany
    {
        return $this->hasMany(Participant::class);
    }

}
