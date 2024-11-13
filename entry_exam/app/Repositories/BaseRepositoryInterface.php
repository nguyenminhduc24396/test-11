<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function getModel();

    /**
     * @param array $columns
     * @param int $offset
     *
     * @return \Illuminate\Support\Collection
     */
    public function fetchList(array $columns = ['*'], $offset = 0, $perPage = 20);

    /**
     * @param array $columns
     * @param int $id
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateList($page = null, array $columns = ['*'], $perPage = 20);

    /**
     * @param $id
     * @param array $columns
     *
     * @return object|null
     */
    public function findById($id, array $columns = ['*']);

    /**
     * @param array $data
     *
     * @return int
     */
    public function store(array $data);

    /**
     * @param $id
     * @param array $data
     *
     * @return int
     */
    public function update($id, array $data);

    /**
     * @param array $data
     *
     * @return boolean
     */
    public function delete(array $data);

    /**
     * @param array $data
     *
     * @return boolean
     */

    public function insert(array $data);

    public function count();
}