@extends('backend.layouts.master')
@section('title') Users @endsection
@section('custome_css')

@endsection
@section('content')

@section('page_title','Users')

<div class="main-content-inner">
<div class="row">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Users</h4>
                <p class="float-right mb-2">
                    <a class="btn btn-primary text-white" href="{{ route('users.create') }}">Add User</a>
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
                                <th width="10%">Email</th>
                                <th width="50%">Role</th>
                                <th width="25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <td>

                                    @foreach ($user->roles as $role )
                                        <span class="badge badge-info mr-1">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-success text-white" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                    <a class="btn btn-danger text-white" href="{{ route('users.destroy',$user->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">

                                    Delete

                                    </a>
                                    <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy',$user->id) }}" method="POST">
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

