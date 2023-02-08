<?php

namespace App\Http\Controllers\Blog\Admin;


use App\Http\Requests\AdminOrderSaveRequest;
use App\Models\Admin\Order;
use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\OrderRepository;
use Illuminate\Http\Request;
use MetaTag;


class OrderController extends AdminBaseController
{

    private $orderRepository;

    public function __construct()
    {
        parent::__construct();
        $this->orderRepository = app(OrderRepository::class);
    }


    public function index()
    {
        $perpage = 10;
        $countOrders = MainRepository::getCountOrders();
        $paginator = $this->orderRepository->getAllOrders(15);

//            MetaTag::setTags(['title' => 'Orders list']);
        return view('blog.admin.order.index',
            compact('countOrders', 'paginator'));
    }


    public function edit($id)
    {
        $item = $this->orderRepository->getEditId($id);
        if (empty($item)) {
            abort(404);
        }

        $order = $this->orderRepository->getOneOrder($item->id);
        if (!$order) {
            abort(404);
        }
        $order_products = $this->orderRepository->getAllOrderProductsId($item->id);

//            MetaTag::setTags(['title' => "Order Nr. {$item->id}"]);
        return view('blog.admin.order.edit',
            compact('item', 'order', 'order_products'));
    }

    /**
     * change status 0 or 1 in admin/orders/$id/edit
     */
    public function change($id)
    {
        $result = $this->orderRepository->changeStatusOrder($id);

        if ($result) {
            return redirect()
                ->route('blog.admin.orders.edit', $id)
                ->with(['success' => 'Successful save']);
        } else {
            return back()
                ->withErrors(['msg' => "Error save"]);
        }

    }

    public function save(AdminOrderSaveRequest $request, $id)
    {
        $result = $this->orderRepository->saveOrderComment($id);
        if ($result) {
            return redirect()
                ->route('blog.admin.orders.edit', $id)
                ->with(['success' => 'Successful save']);
        } else {
            return back()
                ->withErrors(['msg' => "Error save"]);
        }
    }


    /**
     * Soft delete
     * @param $id
     * @return $this
     */
    public function destroy($id)
    {
        $st = $this->orderRepository->changeStatusOnDelete($id);
        if ($st) {
            $result = Order::destroy($id);
            if ($result) {
                return redirect()
                    ->route('blog.admin.orders.index')
                    ->with(['success' => "Entry id [$id] removed"]);
            } else {
                return back()->withErrors(['msg' => 'Error of deleting']);
            }
        } else {
            return back()->withErrors(['msg' => 'Status not change']);
        }
    }

    /**
     * Complete delete
     * @param $id
     * @return $this
     */
    public function forcedestroy($id)
    {

        if (empty($id)) {
            return back()->withErrors(['msg' => 'Record not found']);
        }

        $res = \DB::table('orders')
            ->delete($id);

        if ($res) {
            return redirect()
                ->route('blog.admin.orders.index')
                ->with(['success' => "Entry id [$id] deleted of DB"]);
        } else {
            return back()->withErrors(['msg' => 'Error delete']);
        }
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


}
