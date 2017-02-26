@extends ('backend.layouts.app')

@section ('title', 'LaraShop')

@section('page-header')
    <h1>
        Create Category
        <small>Creating Category</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.categories.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-role','files'=>true]) 
    }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Create Category</h3>

                <div class="box-tools pull-right">
                    
                    <a class="btn btn-success" href="{{route('admin.categories.index')}}">Back To Category List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    <!-- {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                    <div class="col-lg-2">
                        <label for="category_title" class="control-label">Title</label>
                    </div>
                    <div class="col-lg-10">
                        <!-- {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.roles.name')]) }} -->
                        <input type="text" id="category_title" name="title" class="form-control" placeholder="Enter Category Title" />
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <!-- {{ Form::label('associated-permissions', trans('validation.attributes.backend.access.roles.associated_permissions'), ['class' => 'col-lg-2 control-label']) }} -->
                    <div class="col-lg-2">
                        <label for="category_icon_image" class="control-label">Icon Image</label>
                    </div>
                    <div class="col-lg-10">
                        <!-- {{ Form::select('associated-permissions', array('all' => trans('labels.general.all'), 'custom' => trans('labels.general.custom')), 'all', ['class' => 'form-control']) }} -->
                        <input type="file" name="icon_image" id="category_icon_image" class="form-control" placeholder="Upload Icon Image">

                        <div id="available-permissions" class="hidden mt-20">
                            <div class="row">
                                <div class="col-xs-12">
                                    Testing
                                </div><!--col-lg-6-->
                            </div><!--row-->
                        </div><!--available permissions-->
                    </div><!--col-lg-3-->
                </div><!--form control-->

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="category_parent" class="control-label">Parent</label>
                    </div>
                    
                    <div class="col-lg-10">
                        <!-- <input type="text" name="parent_id" id="category_parent" class="form-control" placeholder="Enter Parent Category"> -->
                        {!! Form::select("parent_id", $parent_categories, ["class"=>"form-control"]) !!}
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
