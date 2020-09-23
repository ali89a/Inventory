@extends('admin.layout.master')

@section('css-bottom')
    <link rel="stylesheet" href="{{ asset('/') }}datatable/dataTables.bootstrap4.min.css">
    <style>
        table[class="table dataTable no-footer"]{
            width: 100%!important;
        }
    </style>
@endsection

@section('title','Role Lists')

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Role Lists</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">

                            <li class="breadcrumb-item">
                            <button style="margin-right: 9px;" class="btn btn-info pull-right">
                                    <a style="color: #ffffff;" href="{{route('role.create')}}">Add
                                    Role</a>
                                </button>
                            </li>

                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr class="bg-primary">
                                    <th>Permissions \ Roles</th>
                                    @foreach($roles as $role)
                                        <th class="text-center">
                                            {{ $role->name }}
                                        </th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        @foreach($roles as $role)
                                            <td class="text-center">
                                                <div class="pretty p-switch p-fill p-success">
                                                    <input class="role-permission-cross-field"
                                                           name="matrix" data-role-id="{{ $role->id }}"
                                                           data-permission-id="{{ $permission->id }}"
                                                           value="{{ $permission->id }}" type='checkbox' {{
                                                        $cross_check($role_has_permissions, $role->id, $permission->id) }}/>
                                                    <div class="state p-primary">
                                                        <label></label>
                                                    </div>
                                                </div>
                                            </td>
                                        @endforeach
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

@section('script')
   <script src="{{ asset('vue-js/vue/dist/vue.js') }}"></script>
    <script src="{{ asset('vue-js/axios/dist/axios.min.js') }}"></script>
    <script>
        $(function(){

            $('.role-permission-cross-field').on('change', function(){

                var role_id=$(this).attr('data-role-id');
                var permission_id=$(this).attr('data-permission-id');
                var status=$(this).prop('checked');
                axios({
                    method: 'post',
                    url: "{{ url('access-control/change-role-permission') }}",
                    data: {
                        role_id: role_id,
                        permission_id: permission_id,
                        status: status
                    },
                    config: { headers: {'Content-Type': 'multipart/form-data' }}
                }).then(function(response){

                    toastr.success('Role permission changed successfully!.', '', {
                        closeButton: true,
                        progressBar: true,
                    });

                }).catch(function (error){

                    toastr.error('Sorry!, form submission failed. Enter valid data.', '', {
                        closeButton: true,
                        progressBar: true,
                    });

                });

            })

        });
    </script>
@endsection
