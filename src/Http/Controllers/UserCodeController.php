<?php

namespace Tots\AuthTfaBasic\Http\Controllers;

use Illuminate\Http\Request;
use Tots\AuthTfaBasic\Http\Requests\TfaBasicRequest;
use Tots\AuthTfaBasic\Http\Responses\TfaBasicResponse;
use Tots\AuthTfaBasic\Models\TotsUserCode;
use Tots\AuthTfaBasic\Services\UserCodeService;
use Tots\Email\Services\TotsEmailService;

class UserCodeController extends \Laravel\Lumen\Routing\Controller
{
    protected UserCodeService $service;
    protected TotsEmailService $emailService;

    public function __construct(UserCodeService $service, TotsEmailService $emailService)
    {
        $this->service = $service;
        $this->emailService = $emailService;
    }

    public function send(Request $request)
    {
        // Validation
        $this->validate($request, TfaBasicRequest::rules());
        // Generate new code
        $code = $this->service->create($request->input('email'), TotsUserCode::PROVIDER_EMAIL);
        // Send email
        $this->emailService->send($request->input('email'), 'recover-password-code', [
            'code' => $code->code,
            'expired_at' => $code->expired_at
        ]);
        // Reponse
        return TfaBasicResponse::make($code);
    }
}
