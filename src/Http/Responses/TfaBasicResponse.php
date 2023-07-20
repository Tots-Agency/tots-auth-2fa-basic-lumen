<?php

namespace Tots\AuthTfaBasic\Http\Responses;

use Tots\AuthTfaBasic\Models\TotsUserCode;

/**
 * Description of Model
 *
 * @author matiascamiletti
 */
class TfaBasicResponse
{
    static public function make(TotsUserCode $code)
    {
        return [
            'success' => true,
            'email' => $code->sent,
            'expired_at' => $code->expired_at,
        ];
    }
}