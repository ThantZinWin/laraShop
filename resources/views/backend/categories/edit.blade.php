@extends ('backend.layouts.app')

@section ('title', 'LaraShop')

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.roles.management') }}
        <small>{{ trans('labels.backend.access.roles.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($category, ['route' => ['admin.categories.update', $category], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-category','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.roles.edit') }}</h3>

                <div class="box-tools pull-right">
                   <a class="btn btn-md btn-danger" href={{route('admin.categories.index')}}>Back To Category List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Title</label>

                    <div class="col-lg-10">
                        {{ Form::text('title', $category->title, ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <!-- {{ Form::label('associated-permissions', trans('validation.attributes.backend.access.roles.associated_permissions'), ['class' => 'col-lg-2 control-label']) }} -->
                    <label class="col-lg-2 control-label">Image</label>

                    <div class="col-lg-10">
                       <img src="{{url('/images/90x60/categories/'.$category->icon_image) }}"/>
                       <input type="file" name="icon_image" id="category_icon_image" class="form-control" placeholder="Upload Icon Image">

                    </div><!--col-lg-3-->
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">Parent Id</label>

                    <div class="col-lg-10">
                        {!!Form::select("parent_id", $parent_categories,$category->parent_id, ["class"=>"form-control","id"=>"category_parent"])!!}
                        <!-- {{ Form::text('parent_id', $category->parent_id, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.roles.sort')]) }} -->
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