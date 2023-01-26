<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'max:255', Rule::unique('users')->ignore($user->id)],
            // 'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

            $user->forceFill([
                'name' => $input['name'],
                'username' => $input['username'],
               
            ])->save();
        
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'username' => $input['username'],
            'username_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
