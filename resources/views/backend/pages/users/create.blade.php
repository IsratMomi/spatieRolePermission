@extends('backend.layouts.master')
@section('title') Dashboard @endsection
@section('custome_css')
    <style>
        .form-check-label{
            text-transform: capitalize;
        }
    </style>
@endsection
@section('content')

@section('page_title','User Create')

<div class="main-content-inner">
<div class="row">
    <div class="col-12 mt-5">
        {{-- <p class="float-right mb-5">
            <a class="btn btn-primary text-white" href="{{ route('users.index') }}">All Users</a>
        </p> --}}
        <div class="card">

            <div class="card-body">

                <h4 class="header-title">User Create</h4>

                @include('backend.layouts.includes.messages')
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                   <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"  placeholder="Enter  name">

                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="name">Email</label>
                            <input type="text" class="form-control" id="email" name="email"  placeholder="Enter email">

                        </div>
                   </div>
                   <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"  placeholder="Enter password">

                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="password_confirmation">Confirm password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  placeholder="Confirm Password">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="password">Assign Role</label>
                            <select name="roles[]" id="roles" class="form-control select2" multiple="multiple">
                                <option value="" disabled>Select Role</option>
                                @foreach ($roles as $role )

                                <option value="{{ $role->name }}">{{ $role->name }}</option>

                                @endforeach
                            </select>

                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('custom_js')
    <script>

    </script>
@endsection

