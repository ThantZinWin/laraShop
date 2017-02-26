@extends ('backend.layouts.app')

@section ('title', 'LaraShop')

@section('page-header')
    <h1>
        Create Order
        <small>Creating Order Item</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.orders.store', 'class' => 'form-horizontal','role' => 'form', 'method' => 'post', 'id' => 'create-order']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.roles.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.access.includes.partials.role-header-buttons')
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
                        {!!Form::select('product_id[]',$products,null,["class"=>"form-control", "id"=>"product_id","multiple"=>"multiple"])!!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="order_amount" class="control-label">
                        Order-Amount</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" id="order_amount" name="order_amount" class="form-control" placeholder="Enter Order Amount" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="order_address" class="control-label">
                        Order-Address</label>
                    </div>
                    <div class="col-lg-10">
                        <textarea id="order_address" name="order_address" 
                        class="form-control" placeholder="Enter Order Address"></textarea>
                    </div>
                </div>  

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="order_phone" class="control-label">
                        Order-Phone</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" id="order_phone" name="order_phone" 
                        class="form-control" placeholder="Enter Order Pnone" />
                    </div>
                </div>    

                <div class="form-group">
                    <div class="col-lg-2">
                       <label for="order_status" class="control-label">
                        Order-Status</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::select('order_status',[0=>"Panding",1=>"Completed"],null,["class"=>"form-control", "id"=>"order_status"])!!}
                        <!-- <input type="text" id="order_status" name="order_status" class="form-control" placeholder="Enter Order Status"/> -->
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="payment_status" class="control-label">
                        Payment-Status</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::select('payment_status',[0=>"Panding",1=>"Completed"],
                        null,["class"=>"form-control", "id"=>"payment_status"])!!}
                        <!-- <input type="text" id="payment_status" name="payment_status" class="form-control" placeholder="Enter Payment Status" /> -->
                    </div><!--col-lg-10-->
                </div><!--form control-->  

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="payment_method" class="control-label">
                            Payment-Method</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::select('payment_method',["0"=>"Cash","1"=>"MPU"],
                        null,["class"=>"form-control", "id"=>"payment_method"])!!}
                        <!-- <input type="text" id="payment_method" name="payment_method" class="form-control" placeholder="Enter Payment Method" /> -->
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
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts')
    {{ Html::script('js/backend/access/roles/script.js') }}
@stop
