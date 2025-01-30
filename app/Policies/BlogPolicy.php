<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Blog $blog)
    {
        return $user->id === $blog->author_id;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Blog $blog)
    {
        return $user->id === $blog->author_id;
    }

    public function delete(User $user, Blog $blog)
    {
        return $user->id === $blog->author_id;
    }

    public function restore(User $user, Blog $blog)
    {
        return $user->id === $blog->author_id;
    }

    public function forceDelete(User $user, Blog $blog)
    {
        return $user->id === $blog->author_id;
    }
}
