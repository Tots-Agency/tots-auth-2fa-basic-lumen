<?php

namespace Tots\AuthTfaBasic\Http\Requests;

use Illuminate\Http\Request;

/**
 * Description of Model
 *
 * @author matiascamiletti
 */
class TfaBasicRequest extends Request
{
    public function rules()
    {
        return [
            'email' => 'required|email',
        ];
    }
}