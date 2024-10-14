<?php

namespace App\Http\Controllers\V1;

use App\Exceptions\CreatePreferenceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Preference\PreferenceRequest;
use App\Services\Preference\Preference;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PreferenceController extends Controller
{

    public function create(PreferenceRequest $request)
    {
        try {
            Preference::create($request);
        } catch (\Throwable $exception) {
            throw new CreatePreferenceException($exception->getMessage(), $exception->getCode());
        }
        return Response::success(null, __('success_response'));
    }

    public function show()
    {
        $user_id = Auth::user()->id;

        return Response::success( Preference::show($user_id), __('success_response'));

    }


}
