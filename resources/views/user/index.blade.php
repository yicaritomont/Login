@extends('layouts.app')

@section('title', trans('words.ManageUsers'))

@section('content')
    <div class="row">
        <div class="col-md-5">            
                <h3 class="modal-title"> {{ str_plural(trans('words.User'), 2) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> @lang('words.Create')</a>
            @if(!Auth::check())
                <a href="{{ route('login') }}" class="btn btn-success btn-sm"> <i class="glyphicon glyphicon-user"></i> @lang('words.Login')</a>
            @endif

            
        </div>
    </div>


    <div class="result-set">
        <table class="table table-bordered table-hover dataTable nowrap" id="data-table">
            <thead>
            <tr>
                <th>@lang('words.Id')</th>
                <th>@lang('words.Name')</th>
                <th>@lang('words.Email')</th>
                <th>@lang('words.CreatedAt')</th>
                <th>@lang('words.UpdatedAt')</th> 
                @can('edit_users', 'delete_users')
                <th class="text-center">@lang('words.Actions')</th>
                @endcan
            </tr>
            </thead>
        </table>
    </div>
@endsection

@section('scripts')
    <script>  
        
        $(document).ready(function() {

            //Se definen las columnas (Sin actions)
            var columns = [
                {data: 'id'},
                {data: 'name'},
                {data: 'email', orderable: false},
                {data: 'created_at'},
                {data: 'updated_at'},
            ];

            @can('edit_users', 'delete_users')
                
                dataTableObject.ajax = {url: "{{ route('datatable', ['model' => 'User', 'whereHas' => 'none', 'entity' => 'user', 'identificador' => 'id', 'relations' => 'none']) }}"};
                columns.push({data: 'actions', className: 'text-center wCellActions', orderable: false},)
                dataTableObject.columnDefs = [formatDateTable([-2, -3])];
            @else
                dataTableObject.ajax = {url: "{{ route('datatable', ['model' => 'User', 'whereHas' => 'none', 'relations' => 'none']) }}"};
                dataTableObject.columnDefs = [formatDateTable([-1, -2])];
            @endcan

            dataTableObject.columns = columns;
            
            dataTableObject.ajax.type = 'POST';
            dataTableObject.ajax.data = {_token: window.Laravel.csrfToken};

            var table = $('.dataTable').DataTable(dataTableObject);
        });
    </script>
@endsection