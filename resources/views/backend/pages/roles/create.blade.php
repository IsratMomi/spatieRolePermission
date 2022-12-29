@extends('backend.layouts.master')
@section('title') Dashboard @endsection
@section('custome_css')
@endsection
@section('content')

@section('page_title','Role Create')

<div class="main-content-inner">
<div class="row">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Role Create</h4>
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"  placeholder="Enter role name">

                    </div>
                    <div class="form-group">
                        <label for="name">Permissions</label>
                        @foreach ($permissions as $permission )
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach

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
@endsection

