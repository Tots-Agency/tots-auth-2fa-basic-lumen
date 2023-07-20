<?php

namespace Tots\AuthTfaBasic\Services;

use Tots\Auth\Models\TotsUser;
use Tots\AuthTfaBasic\Models\TotsUserCode;

/**
 * Description of Model
 *
 * @author matiascamiletti
 */
class UserCodeService
{
    public function create($email, $provider)
    {
        // Expire old codes
        $this->expiredAll($email);
        // Verify if exist email user
        $user = TotsUser::where('email', $email)->first();
        if($user === null){
            throw new \Exception('User not found');
        }
        // Create new code
        $code = new TotsUserCode();
        $code->user_id = $user->id;
        $code->sent = $email;
        $code->code = $this->generateCode();
        $code->status = TotsUserCode::STATUS_PENDING;
        $code->provider = $provider;
        $code->expired_at = date('Y-m-d H:i:s', strtotime('+30 minutes'));
        $code->save();

        return $code;
    }

    public function expiredAll($email)
    {
        TotsUserCode::where('sent', $email)->update(['status' => TotsUserCode::STATUS_EXPIRED]);
    }

    public function generateCode()
    {
        $code = '';
        for($i=0; $i<6; $i++){
            $code .= rand(0,9);
        }
        return $code;
    }
}