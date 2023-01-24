<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EntityCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'entity_id',
        'entity_category',
    ];

    /**
     * Get the entity that owns the EntityCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity(): BelongsTo
    {
        return $this->belongsTo(Entity::class);
    }

}
