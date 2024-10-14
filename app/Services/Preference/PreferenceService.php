<?php

namespace App\Services\Preference;


use App\Repositories\Preference\PreferenceRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class PreferenceService implements PreferenceServiceInterface {


    private PreferenceRepositoryInterface $preferenceRepository;

    public function __construct(PreferenceRepositoryInterface $preferenceRepository)
    {
        $this->preferenceRepository = $preferenceRepository;
    }

    public function create($request)
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
    }

    public function show($user_id)
    {
        return $this->preferenceRepository->show($user_id);
    }
}
