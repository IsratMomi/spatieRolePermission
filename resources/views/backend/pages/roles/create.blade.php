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

@section('page_title','Role Create')

<div class="main-content-inner">
    <?php
        $user = Auth::guard('admin')->user();
    ?>
<div class="row">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Role Create</h4>
                <p class="float-right mb-2">
                    @if ($user->can('role.view'))
                        <a class="btn btn-primary text-white" href="{{ route('roles.index') }}">All Role</a>
                    @endif

                </p>
                @include('backend.layouts.includes.messages')
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"  placeholder="Enter role name">

                    </div>
                    <div class="form-group">
                        <label for="name">Permissions</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="" id="checkPermissionAll" value="1">
                            <label class="form-check-label" for="checkPermissionAll">All</label>
                        </div>
                        <hr>
                        @php $i = 1; @endphp
                        @foreach ($permission_groups as $group )
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                        <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                    </div>
                                </div>
                                <div class="col-9 role-{{ $i }}-management-checkbox">
                                    @php
                                        $permissions = App\Models\User::getpermissionByGroupName($group->name);
                                        $j = 1;
                                    @endphp
                                    @foreach ($permissions as $permission )
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                            <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                        @php $j++; @endphp
                                    @endforeach
                                </div>
                            </div>
                            @php $i++; @endphp
                            <hr>
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
    <script>
        $("#checkPermissionAll").click(function(){
            if($(this).is(':checked')){
                $('input[type=checkbox]').prop('checked',true);
            }
            else{
                $('input[type=checkbox]').prop('checked',false);
            }
        });

        function checkPermissionByGroup(className, checkThis){
            const groupIdName = $('#'+checkThis.id);
            const classCheckBox = $('.'+className+' input')
            if(groupIdName.is(':checked')){
                classCheckBox.prop('checked',true);
            }
            else{
                classCheckBox.prop('checked',false);
            }
        }
    </script>
@endsection

