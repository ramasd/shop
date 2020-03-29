<?php

namespace App\Repositories\Interfaces;

interface ProductInterface
{
    /**
     * @return Product[]|\Illuminate\Database\Eloquent\Collection|mixed
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
     * @return Product
     */
    public function show($id);
}
