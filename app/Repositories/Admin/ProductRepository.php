<?php

namespace App\Repositories\Admin;

use App\Repositories\CoreRepository;
use App\Models\Admin\Product as Model;

class ProductRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getLastProducts($perpage){
        $get = $this->startConditions()
            ->orderBy('id','desc')
            ->limit($perpage)
            ->paginate($perpage);
        return $get;
    }
}
