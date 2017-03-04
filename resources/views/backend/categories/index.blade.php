@extends ('backend.layouts.app')

@section ('title', 'LaraShop'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Categories</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Category Management</h3>

            <div class="box-tools pull-right">
                <a class="btn btn-info btn-xs" href="{{ route('admin.categories.create') }}">Create Creategories</a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="roles-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Icon Image</th>
                            <th>Parent ID</th>
                            <th>Created_at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorieslist as $categorylist)
                        <tr>
                            <td>{{$categorylist->id}}</td>
                            <td>{{$categorylist->title}}</td>
                            <td><img src="{{url('/images/90x60/categories/'.$categorylist->icon_image) }}"/></td>
                            <td>{{$categorylist->parent_id}}</td>
                            <td>{{$categorylist->created_at}}</td>
                            <td>
                                {!! Form::open(["route"=>["admin.categories.destroy",$categorylist->id],"method"=>"Delete"] ); !!}
                                <a href="{{ route('admin.categories.edit', $categorylist->id) }}" class="btn btn-info btn-xs">Edit</a>
                                
                                <button class="btn btn-danger btn-xs">Delete</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
{{$categorieslist->links()}}
    
@stop

@section('after-scripts')
    
@stop