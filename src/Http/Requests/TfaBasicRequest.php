<?php

namespace Tots\AuthTfaBasic\Http\Requests;

/**
 * Description of Model
 *
 * @author matiascamiletti
 */
class TfaBasicRequest
{
    static public function rules()
    {
        return [
            'email' => 'required|email',
        ];
    }
}