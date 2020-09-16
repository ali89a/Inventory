@extends('admin.master')
@section('title','User Direct Permission')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-xs-7">
                    <h4 class="page-title">User Direct Permission</h4>
                </div>

            </div>
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">

                        {{ BootForm::open(['url'=>route('user-permission-matrix.store')]) }}
                        <div class="table-responsive">
                            <table class="display datatable table table-stripped">
                                <thead>
                                <th>Permissions \ Users</th>
                                @foreach($users as $user)
                                    <th class="text-center">
                                        {{ $user->name }}
                                    </th>
                                @endforeach
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        @foreach($users as $user)
                                            <td class="text-center">
                                                <div class="pretty p-switch p-fill p-success">
                                                    <input name="matrix[{{ $user->id }}][]" value="{{ $permission->id }}"
                                                           type='checkbox' {{
                            $cross_check($model_has_permissions, $user->id, $permission->id) }}/>
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

                        <div class="btn-group m-t-10">
                            <button type="submit" class="tcb-animate-b tcb-success tcb-small"> <i class="fa fa-save"></i> Save</button>
                            <button type="button" class="tcb-animate-b tcb-warning tcb-small" onclick="location.reload();"><i class="fa fa-refresh"></i> Refresh</button>
                            <a onclick="window.history.back();" class="tcb-animate-b tcb-default tcb-small"><i class="fa fa-reply" aria-hidden="true"></i>&nbsp; Back</a>
                        </div>
                        {{ BootForm::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
