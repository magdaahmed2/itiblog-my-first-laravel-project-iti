<?php

namespace App\Policies;

use App\Models\User;

class CategoryPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

function update(User $user){
   return $user->can("is-admin");
}

}
