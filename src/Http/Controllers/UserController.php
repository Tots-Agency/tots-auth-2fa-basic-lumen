<?php

namespace Tots\AuthTfaBasic\Http\Controllers;

use Illuminate\Http\Request;
use Tots\AuthTfaBasic\Http\Requests\TfaChangePasswordRequest;
use Tots\AuthTfaBasic\Http\Responses\TfaChangePasswordResponse;
use Tots\AuthTfaBasic\Models\TotsUserCode;
use Tots\AuthTfaBasic\Services\UserCodeService;
use Tots\AuthTfaBasic\Services\UserService;

class UserController extends \Laravel\Lumen\Routing\Controller
{
    protected UserCodeService $service;
    protected UserService $userService;

    public function __construct(UserCodeService $service, UserService $userService)
    {
        $this->service = $service;
        $this->userService = $userService;
    }

    public function change(Request $request)
    {
        // Validation
        $this->validate($request, TfaChangePasswordRequest::rules());
        // Use Code
        $this->service->use($request->input('email'), $request->input('code'), TotsUserCode::PROVIDER_EMAIL);
        // Change Password
        $this->userService->changePassword($request->input('email'), $request->input('password'));
        // Reponse
        return TfaChangePasswordResponse::make();
    }
}
