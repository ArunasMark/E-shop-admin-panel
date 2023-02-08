<?php

namespace App\Http\Controllers\Blog\Admin;



use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\OrderRepository;
use App\Repositories\Admin\ProductRepository;
use MetaTag;


class MainController extends AdminBaseController
{
    private $orderRepository;
    private $productRepository;

    public function __construct()
    {
        parent::__constructor();
        $this->productRepository = app(ProductRepository::class);
        $this->orderRepository = app(OrderRepository::class);
    }

    public function index(){
     //MetaTag::setTags(['title' => 'Admin panel']);

     $countOrders = MainRepository::getCountOrders();
     $countUsers = MainRepository::getCountUsers();
     $countProducts = MainRepository::getCountProducts();
     $countCategories = MainRepository::getCountCategories();

     $perpage = 7;

     $last_orders = $this->orderRepository->getAllOrders($perpage);
     $last_products = $this->productRepository->getLastProducts($perpage);
     return view('blog.admin.main.index', compact('countProducts', 'countCategories', 'countUsers', 'countOrders', 'last_products', 'last_orders'));
 }
}
