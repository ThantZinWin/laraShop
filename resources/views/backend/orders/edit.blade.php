@extends ('backend.layouts.app')

@section ('title', 'LaraShop')

@section('page-header')
    <h1>
        Edit Management
        <small>Edit Order</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($order, ['route' => ['admin.orders.update', $order], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-order']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Editing Order</h3>

                <div class="box-tools pull-right">
                    <a class="btn btn-sm btn-danger" href="{{ route('admin.orders.index') }}">Back to Order List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="customer_id" class="control-label">
                        Customer-Id</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::select('customer_id',$users,null,["class"=>"form-control", "id"=>"customer_id"])!!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="product_id" class="control-label">
                        Product-Id</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::select('product_id',$products,null,["class"=>"form-control", "id"=>"product_id","multiple"=>"multiple"])!!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="order_amount" class="control-label">
                        Order-Amount</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::text('order_amount',null,["class"=>"form-control", "id"=>"order_amount"])!!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="order_address" class="control-label">
                        Order-Address</label>
                    </div>
                    <div class="col-lg-10">
                        <textarea id="order_address" name="order_address" 
                        class="form-control" placeholder="Enter Order Address">
                            {{ $order->order_address }}
                        </textarea>
                    </div>
                </div>  

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="order_phone" class="control-label">
                        Order-Phone</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::text('order_phone',null,["class"=>"form-control", "id"=>"order_phone"])!!}
                    </div>
                </div>    

                <div class="form-group">
                    <div class="col-lg-2">
                       <label for="order_status" class="control-label">
                        Order-Status</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::text('order_status',null,["class"=>"form-control", "id"=>"order_status"])!!}
                        
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="payment_status" class="control-label">
                        Payment-Status</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::text('payment_status',null,["class"=>"form-control", "id"=>"payment_status"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->  

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="payment_method" class="control-label">
                            Payment-Method</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::text('payment_method',null,["class"=>"form-control", "id"=>"payment_method"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->          

            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.role.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left--> 

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts')
    {{ Html::script('js/backend/access/roles/script.js') }}
@stop