<?php

namespace App\Repositories;

use App\Product;
use App\Repositories\Interfaces\ProductInterface;

class ProductRepository implements ProductInterface
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return Product[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all()
    {
        return $this->product->all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->product->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        return $this->product->destroy($id);
    }

    /**
     * @param $id
     * @return Product
     */
    public function show($id)
    {
        return $this->product-findOrFail($id);
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param $product
     * @return $this
     */
    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @param $relations
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function with($relations)
    {
        return $this->product->with($relations);
    }
}
