@extends('layouts.app')


@section('content')

@include('layouts/page_header', 
        ['title' => 'Role Management', 
        'link' => route('roles.create'), 
        'link_title' => 'Create New Role',
        'icon' => 'fas fa-plus'])

@include('layouts/error')
@include('layouts/success')

@include('layouts/search', ['url' => route('roles.index'),
    'placeholder' => 'Enter with Role Name'
])


<div class="table-responsive">
<table class="table table-bordered">
    <tr class="row m-0">
        <th class="text-center text-uppercase d-inline-block col-12 col-md-1">ID</th>
        <th class="text-center text-uppercase d-inline-block col-12 col-md-9">Name</th>
        <th class="text-center text-uppercase d-inline-block col-12 col-md-2 actions">Actions</th>
    </tr>
    @if ($roles->count() > 0)
        @foreach ($roles as $key => $role)
        <tr class="row m-0">
            <td class="d-inline-block col-12 col-md-1">{{ $role->id }}</td>
            <td class="d-inline-block col-12 col-md-9">{{ $role->name }}</td>
            <td class="d-inline-block col-12 col-md-2 actions">
                <a class="text-secondary" href="{{ route('roles.show',$role->id) }}"><i class="far fa-eye"></i></a>
                @can('role-edit')
                    <a class="text-secondary" href="{{ route('roles.edit',$role->id) }}"><i class="fas fa-pen"></i></a>
                @endcan
                @if($role->id  != 1)
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'id'=>'form-delete'.$role->id]) !!}
                        <a class="text-danger" href="javascript:void(0)" onclick="$('#form-delete{{$role->id}}').submit();">
                            <i class="fas fa-trash"></i>
                        </a>
                        {!! Form::close() !!}
                    @endcan
                @else
                    @can('role-delete')
                        <a class="text-danger disabled" href="javascript:void(0)">
                            <i class="fas fa-ban"></i>
                        </a>
                    @endcan
                @endif
            </td>
        </tr>
        @endforeach
    @else
        <tr>
            <td class="text-center d-inline-block col-12">
                No results found to: <strong>{{$search}}</strong>
            </td>
        </tr>
    @endif
</table>
</div>

{!! $roles->render() !!}


@include('layouts/copying')

@endsection