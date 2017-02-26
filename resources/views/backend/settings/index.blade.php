@extends ('backend.layouts.app')

@section ('title', 'LaraShop'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Setting Page</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Setting</h3>

            <div class="box-tools pull-right">
                <a class="btn btn-info btn-xs" href="{{ route('admin.settings.create') }}">Setting list</a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="roles-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Created_at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($settings as $setting)
                        <tr>
                            <td>{{$setting->id}}</td>
                            <td>{{$setting->name}}</td>
                            <td>{{$setting->value}}</td>
                            <td>{{$setting->created_at}}</td>
                            <td>
                                {!! Form::open(["route"=>["admin.settings.destroy",$setting->id],"method"=>"Delete"] ); !!}
                                <a href="{{ route('admin.settings.edit', $setting->id) }}" class="btn btn-info btn-xs">Edit</a>
                                
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
{{$settings->links()}}
    
@stop

@section('after-scripts')
    
@stop