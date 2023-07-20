<?php

namespace Tots\AuthTfaBasic\Services;

use Illuminate\Support\Facades\Hash;
use Tots\Auth\Models\TotsUser;

/**
 * Description of Model
 *
 * @author matiascamiletti
 */
class UserService
{
    public function changePassword($email, $newPassword)
    {
        // Get User by email
        $user = TotsUser::where('email', $email)->first();
        // Change Password
        $user->password = Hash::make($newPassword);
        $user->save();
    }
}