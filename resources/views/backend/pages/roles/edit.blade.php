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

@section('page_title')
    Role Edit- {{ $role->name }}
@endsection

<div class="main-content-inner">
<div class="row">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Role Edit</h4>
                <p class="float-right mb-2">
                    <a class="btn btn-primary text-white" href="{{ route('roles.index') }}">All Role</a>
                </p>
                @include('backend.layouts.includes.messages')
                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}"  placeholder="Enter role name">

                    </div>
                    <div class="form-group">
                        <label for="name">Permissions</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="" id="checkPermissionAll" value="1" {{ App\Models\User::roleHasPermission($role,$all_permission) ? 'checked' : '' }}>
                            <label class="form-check-label" for="checkPermissionAll">All</label>
                        </div>
                        <hr>
                        @php $i = 1; @endphp
                        @foreach ($permission_groups as $group )
                            <div class="row">
                                @php
                                $permissions = App\Models\User::getpermissionByGroupName($group->name);
                                $j = 1;
                                @endphp
                                <div class="col-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\Models\User::roleHasPermission($role,$permissions) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                    </div>
                                </div>
                                <div class="col-9 role-{{ $i }}-management-checkbox">

                                    @foreach ($permissions as $permission )
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox','{{ $i }}Management',{{ count($permissions) }})" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
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
            implementAllChecked();
        }
        function checkSinglePermission(groupClassName, groupID, countTotalPermission){
            const classCheckBox = $('.'+groupClassName+ ' input');
            const groupIDCheckBox = $("#"+groupID);

            if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
                groupIDCheckBox.prop('checked',true);
            }
            else{
                groupIDCheckBox.prop('checked',false);
            }
            implementAllChecked();
        }

        function implementAllChecked(){
            const countPermissions = {{ count($all_permission) }};
            const countPermissionGroups = {{ count($permission_groups) }};
            // console.log(countPermissionGroups + countPermissions);
            if($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)){
                $("#checkPermissionAll").prop('checked',true);
            }
            else{
                $("#checkPermissionAll").prop('checked',false);
            }
        }
    </script>
@endsection

