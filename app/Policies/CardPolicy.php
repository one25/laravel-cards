<?php

namespace App\Policies;

use App\Models\ {User, Card};

class CardPolicy extends Policy
{
    /**
     * Determine whether the user can manage the comment.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Card $Card
     * @return mixed
     */
    public function manage(User $user, Card $card)
    {
        return $user->id === $card->user_id;
    }
}
