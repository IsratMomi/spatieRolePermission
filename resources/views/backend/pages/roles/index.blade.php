@extends('backend.layouts.master')
@section('title') Dashboard @endsection
@section('custome_css')
@endsection
@section('content')

@section('page_title','Roles')

<div class="main-content-inner">
<div class="row">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Roles</h4>
                <div class="data-tables">
                    <table id="dataTable" class="text-center responsive">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a class="btn btn-success text-white" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                    <a class="btn btn-danger text-white" href="">Delete</a>
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

