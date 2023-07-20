<?php

namespace Tots\AuthTfaBasic\Http\Responses;

/**
 * Description of Model
 *
 * @author matiascamiletti
 */
class TfaChangePasswordResponse
{
    static public function make()
    {
        return [
            'success' => true
        ];
    }
}