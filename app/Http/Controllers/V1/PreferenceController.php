<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Preference\PreferenceRequest;
use App\Repositories\Preference\PreferenceRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PreferenceController extends Controller
{

    private PreferenceRepositoryInterface $preferenceRepository;

    public function __construct(PreferenceRepositoryInterface $preferenceRepository)
    {
        $this->preferenceRepository = $preferenceRepository;
    }


    public function create(PreferenceRequest $request)
    {

        $user_id =Auth::user()->id;
        $request->whenFilled('categories_id',function($category) use($user_id){
             $this->preferenceRepository->syncCategory($user_id,$category);
        });
        $request->whenFilled('sources_id',function($source) use($user_id){
             $this->preferenceRepository->syncSource($user_id,$source);
        });
        $request->whenFilled('authors_id',function($author) use($user_id){
             $this->preferenceRepository->syncAuthor($user_id,$author);
        });

        return Response::success(null,__('success_response'));
    }

    public function show()
    {
        $user_id =Auth::user()->id;

        return Response::success($this->preferenceRepository->show($user_id),__('success_response'));

    }


}
