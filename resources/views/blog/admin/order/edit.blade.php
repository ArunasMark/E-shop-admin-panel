
@extends('layouts.app_admin')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit order Nr. {{$item->id}}
    <!-- jeigu uzsakymas naujas ir neapdorotas isvesime statusa '1' -->
            @if (!$order->status)
                <a href="{{route('blog.admin.orders.change',$item->id)}}/?status=1" class="btn btn-success
                btn-xs">Done</a>
                <a href="#" class="btn btn-warning btn-xs redact">Edit</a>
                @else
                <a href="{{route('blog.admin.orders.change',$item->id)}}/?status=0" class="btn btn-default
                btn-xs">Exit to edit</a>
            @endif

        <a class="btn btn-xs" href="">
            <form id="delform" method="post" action="{{route('blog.admin.orders.destroy', $item->id)}}"
                  style="float: none">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-xs delete">Delete</button>
            </form>
        </a>

    </h1>

    @component('blog.admin.components.breadcrumb')
        @slot('parent') Main @endslot
        @slot('order') Orders list @endslot
        @slot('active') Order Nr. {{$item->id}} @endslot
    @endcomponent

</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <form action="{{route('blog.admin.orders.save',$item->id)}}" method="post">

                            @csrf
                            <table class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td>Order number</td>
                                    <td>{{$order->id}}</td>
                                </tr>
                                <tr>
                                    <td>Date of order</td>
                                    <td>{{$order->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>Date of update</td>
                                    <td>{{$order->updated_at}}</td>
                                </tr>
                                <tr>
                                    <td>Quantity of products in the order</td>
                                    <td>{{count($order_products)}}</td>
                                </tr>
                                <tr>
                                    <td>Total amount</td>
                                    <td>{{$order->sum}} {{$order->currency}}</td>
                                </tr>
                                <tr>
                                    <td>Customer name </td>
                                    <td>{{$order->name}}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{{$order->status ? 'Finished' : 'New'}}</td>
                                </tr>
                                <tr>
                                    <td>Comments</td>
                                    <td><input type="text" value="@if (isset($order->note)){{$order->note}} @endif" placeholder="@if (!isset($order->note))no comments
                                          @endif" name="comment">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <input type="submit" name="submit" class="btn btn-warning" value="Save">
                        </form>
                    </div>
                </div>
            </div>

            <h3>Order details</h3>
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Products name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $qty = 0 @endphp
                            @foreach($order_products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->qty, $qty+=$product->qty}}</td>
                                <td>{{$product->price}}</td>
                            </tr>
                           @endforeach

                            <tr class="active">
                                <td colspan="2"><b>Total:</b></td>
                                <td><b>{{$qty}}</b></td>
                                <td><b>{{$order->sum}} {{$order->curreny}}</b></td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
@endsection
