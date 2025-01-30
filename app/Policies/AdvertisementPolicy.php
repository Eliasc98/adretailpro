<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Advertisement;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertisementPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Advertisement $advertisement)
    {
        return $user->id === $advertisement->user_id;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Advertisement $advertisement)
    {
        return $user->id === $advertisement->user_id;
    }

    public function delete(User $user, Advertisement $advertisement)
    {
        return $user->id === $advertisement->user_id;
    }

    public function restore(User $user, Advertisement $advertisement)
    {
        return $user->id === $advertisement->user_id;
    }

    public function forceDelete(User $user, Advertisement $advertisement)
    {
        return $user->id === $advertisement->user_id;
    }
}
