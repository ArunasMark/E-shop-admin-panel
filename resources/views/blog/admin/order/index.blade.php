
@extends('layouts.app_admin')

@section('content')


<section class="content-header">
    @component('blog.admin.components.breadcrumb')
        @slot('title') Orders list @endslot
        @slot('parent') Main @endslot
        @slot('active') Orders list @endslot
    @endcomponent
</section>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Costumer</th>
                                <th>Status</th>
                                <th>Total amount</th>
                                <th>Created date</th>
                                <th>Updated date</th>
                                <th>Comments</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            @forelse($paginator as $order)
                                @php $class = $order->status ? 'success' : '' @endphp
                            <tr class="{{$class}}">
                                <td>{{$order->id}}</td>
                                <td>{{$order->name}}</td>
                                <td>
                                    @if ($order->status == 0) New @endif
                                    @if ($order->status == 1) Finished @endif
                                    @if ($order->status == 2)<b style="color: red">Deleted</b>@endif
                                </td>
                                <td>{{$order->sum}} {{$order->currency}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->updated_at}}</td>
                                <td> @if (isset($order->note)){{$order->note}} @endif
                                    @if (!isset($order->note))no comments @endif
                                </td>

                                <td>
                                    <a href="{{route('blog.admin.orders.edit',$order->id)}}" title="Editing order">
                                        <i>&#9998;</i></a>&nbsp;&nbsp;&nbsp;

                                    <a href="{{route('blog.admin.orders.forcedestroy', $order->id)}}" title="Delete
                                    of DB"><i class="fa fa-fw fa-close text-danger deletebd"></i></a>&nbsp;&nbsp;&nbsp;


                                </td>
                            </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center"><h2>No orders</h2></td>
                                </tr>

                            @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>{{count($paginator)}} order(s) of {{$countOrders}} </p>

                        @if ($paginator->total() > $paginator->count())
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">

                                            {{$paginator->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->

@endsection
