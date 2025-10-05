<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        if (! $user->profile) {
            $user->profile()->create([
                'full_name' => $user->name,
                // ضيف أي أعمدة تانية default لو عايز تتفادى null
                'occupation' => '',
                'company_name' => '',
                'phone' => '',
                'address' => '',
                'city' => '',
                'linkedin' => '',
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
            ]);
        }
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        // if($user->profile) {
        //     $user->profile()->update([
        //         'user_id' => $user->id,
        //         'full_name' => $user->name,
        //         'email' => $user->email,
        //     ]);
        // }
        if($user->wasChanged('name') && $user->profile) {
            $user->profile()->update([
                'full_name' => $user->name,
            ]);
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        $user->profile?->delete();
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
