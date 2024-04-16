<?php

namespace App\Repositories\V1\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface ShortLinksRepositoryInterface
{
    public function create(array $attributes): Model;

    public function find(int $id, array $columns = ['*'], bool $withTrashed = false): ?Model;

    public function paginate(int $perPage = 15, array $columns = ['*'], array $where = [], array $orWhere = [], array $orderBy = [], bool $withTrashed = false): LengthAwarePaginator;

    public function update(array $attributes, int $id, bool $withTrashed = false): Model;
}
