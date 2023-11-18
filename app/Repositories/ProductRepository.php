<?php
namespace App\Repositories;
use App\Models\Product;
use App\Repositories\AbstractRepository\AbstractRepository;
class ProductRepository extends AbstractRepository{
    protected $modelClass = Product::class;
}

?>