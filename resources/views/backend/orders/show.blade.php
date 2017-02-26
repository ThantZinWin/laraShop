@extends ('backend.layouts.app')

@section ('title', 'LaraShop')

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Order</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Show Order</h3>

            <div class="box-tools pull-right">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.orders.index') }}">Showing Order List</a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="roles-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            
                            <th>Customer-Name</th>
                            <th>Order-Id</th>
                            <th>Product</th>
                            <th>Product-price</th>
                            <th>Order-Amount</th>
                            <th>Created-At</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($order_items as $order_item)
                    <tr>
                        
                        <td>{{ $order_item->customer }}</td>
                        <td>{{ $order_item->order_id }}</td>
                        <td>{{ $order_item->product_title }}</td>
                        <td>{{ $order_item->product_price }}</td>
                        <td>{{ $order_item->order_amount }}</td>
                        <td>{{ $order_item->created_at }}</td>
                    </tr>
                    @endforeach    
                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->


@stop

@section('after-scripts')

@stop