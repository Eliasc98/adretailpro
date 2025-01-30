<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Advertisement;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertisementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the advertisement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Advertisement  $advertisement
     * @return mixed
     */
    public function update(User $user, Advertisement $advertisement)
    {
        // Only allow the user who created the advertisement to update it
        return $user->id === $advertisement->user_id;
    }

    /**
     * Determine whether the user can delete the advertisement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Advertisement  $advertisement
     * @return mixed
     */
    public function delete(User $user, Advertisement $advertisement)
    {
        // Only allow the user who created the advertisement to delete it
        return $user->id === $advertisement->user_id;
    }
}