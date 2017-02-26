@extends ('backend.layouts.app')

@section ('title','LaraShop') 

@section('page-header')
    <h1>
        Edti Product
        <small>Editing Products</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($product, ['route' => ['admin.products.update', $product], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-product','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Product</h3>

                <div class="box-tools pull-right">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.products.index') }}">Back to Product List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Title</label>

                    <div class="col-lg-10">
                        {{ Form::text('title', null, ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <!-- <div class="form-group">
                    {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <!-- <label class="col-lg-2 control-label" for="product_description">Description</label> -->

                    <!-- <div class="col-lg-10"> -->
                        <!-- {{ Form::text('title', null, ['class' => 'form-control']) }} -->
                        <!-- <textarea rows="5" name="description" id="product_description" class="form-control" placeholder="Product Description">{{$product->description}}</textarea>
                    </div>
                </div> -->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Price</label>

                    <div class="col-lg-10">
                        {{ Form::text('price', null, ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Image</label>

                    <div class="col-lg-10">
                        <img src="{{url('/images/90x60/products/'
                        .$product->image) }}"/>
                        <input type="file" name="image" id="image" class="form-control" placeholder="Upload Product Image">
                    </div><!--col-lg-10-->
                </div><!--form control-->

              

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Category</label>

                    <div class="col-lg-10">
                        {!!Form::select("category_id", $categories, $product->category_id, ["class"=>"form-control"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Brand</label>

                    <div class="col-lg-10">
                        {!!Form::select("brand_id", $brands, $product->brand_id, ["class"=>"form-control"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Quantity</label>

                    <div class="col-lg-10">
                        {{ Form::text('quantity', null, ['class' => 'form-control']) }}
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