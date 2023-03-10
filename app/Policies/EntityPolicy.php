<?php

namespace App\Policies;

use App\Models\Entity;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EntityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'manager', 'secretary', 'moderator', 'coordinator', 'facilitator', 'accountant', 'user']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Entity  $entity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Entity $entity)
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'manager', 'secretary', 'moderator', 'coordinator', 'facilitator', 'accountant', 'user']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'manager', 'moderator', 'user']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Entity  $entity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Entity $entity)
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'manager', 'moderator', 'user']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Entity  $entity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Entity $entity)
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'manager',  'moderator']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Entity  $entity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Entity $entity)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Entity  $entity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Entity $entity)
    {
        //
    }
}
