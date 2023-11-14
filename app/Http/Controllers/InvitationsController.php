<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PublicRequests\InvitationsRequest;
use App\Http\Services\InvitationsService;
use App\Utilities\ErrorUtils;
use App\Utilities\ValidationUtils;

class InvitationsController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new InvitationsService();
    }

    public function index()
    {
        $roles = ValidationUtils::getRoles('array');
        return view('invite', ['roles' => $roles]);
    }

    public function generateInvitation(Request $request)
    {
        $validator = validator($request->all(), (new InvitationsRequest)->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt($request->only("username", "password"))) {
            if (Auth::user()->role == "admin") {
                $info = $this->service->getInvitation($request);
                return view('invitation_created', ['info' => $info]);
            } else {
                return redirect()
                    ->back()
                    ->with(
                        "error",
                        ErrorUtils::invitationPermission
                    );
            }
        } else {
            return redirect()
                ->back()
                ->with(
                    "error",
                    ErrorUtils::invitationCredentials
                );
        }
    }
}
