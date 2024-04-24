<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\AuthService;
use App\Http\Requests\PublicRequests\AuthRequest;
use App\Utilities\ErrorUtils;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new AuthService();
    }

    public function index()
    {
        return view('auth');
    }

    public function auth(Request $request)
    {
        $validationClass = new AuthRequest;

        $validator = validator(
            $request->all(),
            $validationClass->rules(),
            $validationClass->messages()
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt($request->only('username', 'password'))) {

            $user_validity = Auth::user()->deactivation_date;

            if ($user_validity > Carbon::now('GMT-3') || is_null($user_validity)) {

                $user_validity = !is_null($user_validity)
                    ? date("d/m/Y \à\s H\hm", strtotime($user_validity))
                    : 'droparem o banco em prod';

                $new_token = $this->service->generateNewApiToken(Auth::user());
                return view('authenticated', ['info' => [$new_token, $user_validity]]);
            } else {
                return redirect()
                    ->back()
                    ->with(
                        "error",
                        ErrorUtils::deactivatedUser($user_validity)
                    )
                    ->withInput();
            }
        } else {
            return redirect()
                ->back()
                ->with(
                    "error",
                    ErrorUtils::authCredentials
                )
                ->withInput();
        }
    }
}
