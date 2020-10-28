@extends('admin.layouts.app')
@section('title')
Product List
@endsection
@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
@endsection
@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">

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
                        <h3 class="card-title" style="color:#115548;">Product List</h3>
                        <div class="card-tools">
                            <a href="{{route('product.create')}}"><button class="btn btn-sm btn-primary"><i
                                        class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Add Product</button></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Category Name</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Code</th>
                                    <th class="text-center">Bar Code</th>
                                    <th class="text-center">Sale Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $row->product_category->name ?? ''}}</td>
                                    <td class="text-center">{{ $row->name ?? ''}}</td>
                                    <td class="text-center">{{ $row->code ?? ''}}</td>
                                    <td class="text-center">

                                        <img width="240" height="50" src="{{asset(\Storage::url($row->barcode_path))}}"
                                            alt="{{ $row->code}}">
                                    </td>
                                    <td class="text-center">{{ $row->selling_price ?? ''}}</td>
                                    <td>
                                        @can('Role Edit')
                                        <div class="btn-group">
                                            <a href="{{ route('country.edit', $row->id) }}"
                                                class="btn btn-xs btn-primary">
                                                <i class="fa fa-pencil-square-o"></i>
                                                Edit
                                            </a>
                                        </div>
                                        @endcan
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
@section('script')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
@endsection
@push('script-bottom')
<!-- page script -->
<script>
    $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
</script>
@endpush