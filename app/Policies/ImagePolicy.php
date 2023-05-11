<?php

namespace App\Policies;

use App\Models\Image;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ImagePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
        return $user->checkPermission(config('permission.access.image-list'));
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->checkPermission(config('permission.access.image-add'));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Image $image)
    {
        return $user->checkPermission(config('permission.access.image-edit'));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Image $image)
    {
        return $user->checkPermission(config('permission.access.image-delete'));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Image $image)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Image $image)
    {
        //
    }
}
