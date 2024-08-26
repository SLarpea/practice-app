<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return ($user->canAny(['add users', 'add authors'])) ? Response::allow() : Response::denyWithStatus(404);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): Response
    {
        if ($user->canAny(['edit users', 'edit authors']) && $model->hasAnyRole(['Author', 'Publisher', 'Editor', 'Guest'])) return Response::allow();
        if ($user->can('edit self') && $user->id === $model->id) return Response::allow();
        Response::denyWithStatus(404);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): Response
    {
        if ($user->canAny(['delete users', 'delete authors']) && $model->hasAnyRole(['Author', 'Publisher', 'Editor', 'Guest'])) return Response::allow();
        if ($user->can('delete self') && $user->id === $model->id) return Response::allow();
        Response::denyWithStatus(404);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        //
    }
}
