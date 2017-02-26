@extends ('backend.layouts.app')

@section ('title', 'LaraShop'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Order</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Order Item</h3>

            <div class="box-tools pull-right">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.orders.create') }}">Create Order</a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="roles-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Customer-Id</th>
                            <th>Order-Amount</th>
                            <th>Order-Address</th>
                            <th>Order-Phone</th>
                            <th>Order-Status</th>
                            <th>Payment-Status</th>
                            <th>Payment-Method</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user }}</td>
                        <td>{{ $order->order_amount }}</td>
                        <td>{{ $order->order_address }}</td>
                        <td>{{ $order->order_phone }}</td>
                        <td>{{ $order->order_status }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>
                            {!! Form::open(["route"=> ["admin.orders.destroy", $order->id], "method"=>"delete"]) !!}
                            <a class="btn btn-xs btn-info" href="{{ route('admin.orders.show',$order->id) }}">Show</a>
                            <a class="btn btn-xs btn-info" href="{{ route('admin.orders.edit',$order->id) }}">Eidt</a>
                            
                            <button class="btn btn-danger btn-xs" >Delete</button>
                            {!! Form::close() !!}

                        </td>
                    </tr>
                    @endforeach    
                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
{{$orders->links()}}

@stop

@section('after-scripts')

@stop