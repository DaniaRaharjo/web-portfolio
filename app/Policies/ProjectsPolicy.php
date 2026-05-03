<?php

namespace App\Policies;

use App\Models\Projects;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProjectsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    //public function viewAny(User $user): bool
    //{    return false; }

    /**
     * Determine whether the user can view the model.
     */
   // public function view(User $user, Projects $projects): bool
   // {  return false;}

    /**
     * Determine whether the user can create models.
     */
    public function manage(User $user): bool
    {
        return $user->email === 'daniakraharjo@gmail.com';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Projects $projects): bool
    {
        return $this->manage($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Projects $projects): bool
    {
        return $this->manage($user);
    }

    /**
     * Determine whether the user can restore the model.
     */
    //public function restore(User $user, Projects $projects): bool
   // {    return false;}

    /**
     * Determine whether the user can permanently delete the model.
     */
  //  public function forceDelete(User $user, Projects $projects): bool
  //  {return false; }
}
