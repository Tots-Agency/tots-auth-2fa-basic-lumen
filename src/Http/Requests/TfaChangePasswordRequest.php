<?php

namespace Tots\AuthTfaBasic\Http\Requests;

/**
 * Description of Model
 *
 * @author matiascamiletti
 */
class TfaChangePasswordRequest
{
    static public function rules()
    {
        return [
            'email' => 'required|email',
            'code' => 'required|string|min:6',
            'password' => 'required|min:6'
        ];
    }
}