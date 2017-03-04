@extends ('backend.layouts.app')

@section ('title', 'LaraShop')

@section('page-header')
    <h1>
        Create Page
        <small>Creating Page</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.pages.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-role']) 
    }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Create Page</h3>

                <div class="box-tools pull-right">
                    
                    <a class="btn btn-success" href="{{route('admin.pages.index')}}">Back To Page List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    <!-- {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                    <div class="col-lg-2">
                        <label for="title" class="control-label">Title</label>
                    </div>
                    <div class="col-lg-10">
                        <!-- {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.roles.name')]) }} -->
                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter Page Title" />
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <!-- {{ Form::label('associated-permissions', trans('validation.attributes.backend.access.roles.associated_permissions'), ['class' => 'col-lg-2 control-label']) }} -->
                    <div class="col-lg-2">
                        <label for="slug" class="control-label">Slug</label>
                    </div>
                    <div class="col-lg-10">
                        <!-- {{ Form::select('associated-permissions', array('all' => trans('labels.general.all'), 'custom' => trans('labels.general.custom')), 'all', ['class' => 'form-control']) }} -->
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">
                    </div><!--col-lg-3-->
                </div><!--form control-->

                <div class="form-group">
                    <!-- {{ Form::label('associated-permissions', trans('validation.attributes.backend.access.roles.associated_permissions'), ['class' => 'col-lg-2 control-label']) }} -->
                    <div class="col-lg-2">
                        <label for="description" class="control-label">Description</label>
                    </div>
                    <div class="col-lg-10">
                        <!-- {{ Form::select('associated-permissions', array('all' => trans('labels.general.all'), 'custom' => trans('labels.general.custom')), 'all', ['class' => 'form-control']) }} -->
                        <textarea type="text" name="description" id="description" class="tinymce form-control" placeholder="Description">
                            
                        </textarea> 
                    </div><!--col-lg-3-->
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
