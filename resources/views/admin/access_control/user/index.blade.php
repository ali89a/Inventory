@extends('layouts.admin_master')
@section('title','User')
@include('admin.partials.table-style')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Simple Tables</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->

</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Lists</h3>

                        <div class="card-tools">
                            <a href="{{ route('user.create') }}" class="btn btn-primary rounded"><i
                                    class="fa fa-plus"></i>
                                Add New</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Assign Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        @if($row->getRoleNames()->isNotEmpty())
                                        <span class="badge badge-success">
                                            {!! $row->getRoleNames()->implode("</span> <span
                                            class='badge badge-success'>") !!}
                                        </span>
                                        @endif
                                    </td>
                                    <td>

                                        <center>
                                            <div class="btn-group">
                                                <a href="{{ route('user.edit', $row) }}" class="btn btn-xs btn-primary">
                                                    <i class="fas fa-pencil-alt">
                                                    </i> Edit</a>
                                            </div>
                                        </center>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@include('admin.partials.table-script')