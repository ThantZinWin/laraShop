@extends ('backend.layouts.app')

@section ('title', 'LaraShop'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Brand Brand</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Brand</h3>

            <div class="box-tools pull-right">
                <a class="btn btn-info btn-xs" href="{{ route('admin.brands.create') }}">Create Brand</a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="roles-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Created_at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td><img src="{{url('/images/90x60/brands/'.$brand->logo) }}"/></td>
                            <td>{{$brand->created_at}}</td>
                            <td>
                                {!! Form::open(["route"=>["admin.brands.destroy",$brand->id],"method"=>"Delete"] ); !!}
                                <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-info btn-xs">Edit</a>
                                
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
{{$brands->links()}}
    
@stop

@section('after-scripts')
    
@stop