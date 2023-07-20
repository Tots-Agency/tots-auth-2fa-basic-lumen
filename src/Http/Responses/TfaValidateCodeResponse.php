<?php

namespace Tots\AuthTfaBasic\Http\Responses;

/**
 * Description of Model
 *
 * @author matiascamiletti
 */
class TfaValidateCodeResponse
{
    static public function make()
    {
        return [
            'success' => true
        ];
    }
}