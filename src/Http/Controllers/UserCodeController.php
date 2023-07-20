<?php

namespace Tots\AuthTfaBasic\Http\Controllers;

use Illuminate\Http\Request;
use Tots\AuthTfaBasic\Http\Requests\TfaBasicRequest;
use Tots\AuthTfaBasic\Http\Responses\TfaBasicResponse;
use Tots\AuthTfaBasic\Models\TotsUserCode;
use Tots\AuthTfaBasic\Services\UserCodeService;

class UserCodeController extends \Laravel\Lumen\Routing\Controller
{
    protected UserCodeService $service;

    public function __construct(UserCodeService $service)
    {
        $this->service = $service;
    }

    public function send(Request $request)
    {
        // Validation
        $this->validate($request, TfaBasicRequest::rules());
        // Reponse
        return TfaBasicResponse::make($this->service->create($request->input('email'), TotsUserCode::PROVIDER_EMAIL));
    }
}
