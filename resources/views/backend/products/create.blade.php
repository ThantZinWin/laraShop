@extends ('backend.layouts.app')

@section ('title', 'LaraShop')

@section('page-header')
    <h1>
        Create Product
        <small>Creating Products</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.products.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-product','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Create Product</h3>

                <div class="box-tools pull-right">
                    
                    <a class="btn btn-success" href="{{route('admin.products.index')}}">Back To Category List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    <!-- {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                    <div class="col-lg-2">
                        <label for="product_title" class="control-label">Title</label>
                    </div>
                    <div class="col-lg-10">
                        <!-- {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.roles.name')]) }} -->
                        <input type="text" id="product_title" name="title" class="form-control" placeholder="Enter Product Title" />
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <!-- <div class="form-group">
                    <div class="col-lg-2">
                        <label for="product_description" class="control-label">Description</label>
                    </div>
                    <div class="col-lg-10">
                        <textarea id="product_description" name="description" class="form-control" placeholder="Enter Product Description"></textarea>
                    </div>
                </div>-->

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="product_price" class="control-label">Price</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" id="product_price" name="price" class="form-control" placeholder="Enter Product Price" />
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <!-- {{ Form::label('associated-permissions', trans('validation.attributes.backend.access.roles.associated_permissions'), ['class' => 'col-lg-2 control-label']) }} -->
                    <div class="col-lg-2">
                        <label for="product_image" class="control-label">Product Image</label>
                    </div>
                    <div class="col-lg-10">
                        <!-- {{ Form::select('associated-permissions', array('all' => trans('labels.general.all'), 'custom' => trans('labels.general.custom')), 'all', ['class' => 'form-control']) }} -->
                        <input type="file" name="image" id="product_image" class="form-control" placeholder="Upload Product Image">
                    </div><!--col-lg-3-->
                </div><!--form control-->

                
                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="product_category_id" class="control-label">Category</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::select('category_id',$categories,null,["class"=>"form-control", "id"=>"product_category_id"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="product_brand_id" class="control-label">Brand</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::select('brand_id',$brands,null,["class"=>"form-control", "id"=>"product_brand_id"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="product_quantity" class="control-label">Quantity</label>
                    </div>
                    
                    <div class="col-lg-10">
                        <input type="text" name="quantity" id="product_quantity" class="form-control" placeholder="Enter Product Quantity">
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
