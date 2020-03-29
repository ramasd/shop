<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|Model[]
     */
    public function all();

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id);

    /**
     * @param $id
     * @return int
     */
    public function delete($id);

    /**
     * @param $id
     * @return Model
     */
    public function show($id);

    /**
     * @return Model
     */
    public function getModel();

    /**
     * @param $model
     * @return $this
     */
    public function setModel($model);

    /**
     * @param $relations
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function with($relations);
}
