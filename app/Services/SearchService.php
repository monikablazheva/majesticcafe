<?php

namespace App\Services;
use Illuminate\Database\Eloquent\Model;

class SearchService
{
    public function search(Model $model, $term, string $field = 'name', int $perPage = 10)
    {
        if($term == null) {
            $term = "";
        }
        return $model->where($field, 'like', "%$term%")->paginate($perPage);
    }
}
