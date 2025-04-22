<?php

namespace App\Policies;

use App\Models\School;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddedPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return true; // All authenticated users can view the list
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\School  $added
     * @return bool
     */
    public function view(User $user, School $added): bool
    {
        return true; // All authenticated users can view details
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return true; // All authenticated users can create
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\School  $added
     * @return bool
     */
    public function update(User $user, School $added): bool
    {
        return true; // All authenticated users can update
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\School  $added
     * @return bool
     */
    public function delete(User $user, School $added): bool
    {
        return true; // All authenticated users can delete
    }
}
