<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $usera)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $usera, User $user, $perm=null)
    {
        if ($usera->havePermisson($perm[0])){
            return true;
        }else  
        if ($usera->havePermisson($perm[1])){
            return $usera->id === $user->id;
        }
        else {
            return false;
        }

        
    }
    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $usera)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $usera, User $user, $perm=null)
    {
        if ($usera->havePermisson($perm[0])){
            return true;
        }else  
        if ($usera->havePermisson($perm[1])){
            return $usera->id === $user->id;
        }
        else {
            return false;
        }
    }
    
    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
   

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function forceDelete(User $usera, User $model)
    {
        //
    }
}


