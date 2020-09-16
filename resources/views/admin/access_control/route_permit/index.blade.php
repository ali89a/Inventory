@extends('admin.master')
@section('title','Route Permit')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-xs-7">
                    <h4 class="page-title">Route Permit</h4>
                </div>

            </div>
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">

                        <div class="table-responsive">
                            <table class="display datatable table table-stripped">
                                <thead>
                                <tr>
{{--                                    <th>Active</th>--}}
                                    <th>ID</th>
                                    <th>Permision Name</th>
                                    <th>Action Name</th>
                                    <th>URI</th>
{{--                                    <th>Status</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($route_permits as $row)
                                    <tr>
                                        {{--<td class="text-center">
                                            <div class="pretty p-switch p-fill p-success">
                                                <input class="active" value="{{ $row->id }}" type='checkbox' {{ $checked($row->active) }}/>
                                                <div class="state p-primary">
                                                    <label></label>
                                                </div>
                                            </div>
                                        </td>--}}
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->permission }}</td>
                                        <td>{{ $row->action_name }}</td>
                                        <td>{{ $row->uri }}</td>
                                        {{--@if($row->active)
                                            <td><span class="label label-success">Yes</span></td>
                                        @else
                                            <td><span class="label label-danger">No</span></td>
                                        @endif--}}
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
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        $(function(){
            var csrf_token="{{ csrf_token() }}";
            $('.active').on('change', function(){

                //alert($(this).is(':checked'));
                var route_permit_id=$(this).val();
                var active=0;
                if($(this).is(':checked')) active=1;

                axios({
                    method: 'post',
                    url: "{{ route('route-permit.store') }}",
                    data: {
                        csrf_token: csrf_token,
                        route_permit_id: route_permit_id,
                        active: active
                    },
                    config: { headers: {'Content-Type': 'multipart/form-data' }}
                }).then(function(response){

                    toastr.success('Route permit changed successfully!.', '', {
                        closeButton: true,
                        progressBar: true,
                    });

                }).catch(function (error){

                    toastr.error('Sorry!, form submission failed.', '', {
                        closeButton: true,
                        progressBar: true,
                    });

                });

            });
        });
    </script>
@endsection
