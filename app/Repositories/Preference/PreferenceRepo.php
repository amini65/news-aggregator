<?php

namespace App\Repositories\Preference;

use App\Models\Preference;


class PreferenceRepo implements PreferenceRepositoryInterface
{

    private $model;

    public function __construct(Preference $preference)
    {
        $this->model = $preference;
    }

    public function syncCategory(int $user_id, array $inputs)
    {

        $model = $this->getPreferenceByUserId($user_id);

        $model->categories()->sync($inputs);
    }

    public function syncSource(int $user_id, array $inputs)
    {

        $model = $this->getPreferenceByUserId($user_id);

        $model->sources()->sync($inputs);
    }

    public function syncAuthor(int $user_id, array $inputs)
    {

        $model = $this->getPreferenceByUserId($user_id);

        $model->authers()->sync($inputs);
    }

    public function show($user_id): mixed
    {
        return $this->model::query()
            ->with(['categories','sources','authors'])
            ->firstWhere('user_id', $user_id);
    }

    private function getPreferenceByUserId($user_id)
    {
        return $this->model::query()
            ->firstOrCreate(['user_id' => $user_id], ['user_id' => $user_id]);
    }
}
