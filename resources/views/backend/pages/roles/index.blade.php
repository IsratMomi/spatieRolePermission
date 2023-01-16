@extends('backend.layouts.master')
@section('title') Dashboard @endsection
@section('custome_css')
@endsection
@section('content')

@section('page_title','Roles')

<div class="main-content-inner">
    <?php
        $user = Auth::guard('admin')->user();
    ?>
<div class="row">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Roles</h4>
                <p class="float-right mb-2">
                    @if ($user->can('role.create'))
                        <a class="btn btn-primary text-white" href="{{ route('roles.create') }}">Add Role</a>
                    @endif

                </p>
                <div class="clearfix">

                </div>
                <div class="data-tables">
                    @include('backend.layouts.includes.messages')
                    <table id="dataTable" class="text-center responsive">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th width="5%">SL</th>
                                <th width="10%">Name</th>
                                <th width="60%">Permission</th>
                                <th width="25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>

                                    @foreach ($role->permissions as $permission )
                                        <span class="badge badge-info mr-1">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($user->can('role.edit'))
                                        <a class="btn btn-success text-white" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                    @endif
                                    @if ($user->can('role.delete'))
                                        <a class="btn btn-danger text-white" href="{{ route('roles.destroy',$role->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">Delete</a>
                                    @endif
                                 

                                    <form id="delete-form-{{ $role->id }}" action="{{ route('roles.destroy',$role->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>

                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('custom_js')
@endsection

