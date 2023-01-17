@extends('backend.layouts.master')
@section('title') Permission Edit @endsection
@section('custome_css')
    <style>
        .form-check-label{
            text-transform: capitalize;
        }
    </style>
@endsection
@section('content')

@section('page_title','Permission Create')

<div class="main-content-inner">
    <?php
        $user = Auth::guard('admin')->user();
    ?>
<div class="row">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Permission Edit</h4>
                <p class="float-right mb-2">
                    @if ($user->can('role.view'))
                        <a class="btn btn-primary text-white" href="{{ route('permissions.index') }}">All Permission</a>
                    @endif

                </p>
                @include('backend.layouts.includes.messages')
                <form action="{{ route('permissions.update',$permission->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"  placeholder="Enter permission name" value="{{ $permission->name }}">

                    </div>
                    <?php
                        $groups = \Spatie\Permission\Models\Permission::select('group_name as name')->groupBy('group_name')->get();
                        // dd($groups);

                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Select Group Name</label>

                                <select name="group_name" id="selectGroup" class="form-control select2" onchange="groupSelectfunc()">
                                    <option value="" selected disabled>Select Group</option>
                                    @foreach ($groups as $group )

                                    <option value="{{ $group->name }}" @if ($group->name == $permission->group_name) selected @endif>{{ $group->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class=" col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="password">Type Group Name</label>
                                <input type="text" class="form-control" id="type_group_name" name="group_name"  placeholder="Enter permission name" value="{{ $permission->group_name }}">
                            </div>
                        </div>



                        <div class="form-group col-md-6 col-sm-12">


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
        function groupSelectfunc(){
            $('#type_group_name').prop('disabled','disabled');
        }

        $('#type_group_name').change(function(){
            $('#selectGroup').prop('disabled', true);
        })


    </script>
@endsection

