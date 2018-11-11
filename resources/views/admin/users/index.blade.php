@extends('layouts.admin.app')

@section('assets-top')
<link  href="{{ asset('assets/blog-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link  href="{{ asset('assets/blog-admin/vendor/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <!-- breadcumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Users</a>
            </li>
            <li class="breadcrumb-item active">User Management</li>
        </ol>
         <!-- example data tables -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-list"></i> List Users
                <a href="{{ route('admin.users.create') }}" class="pull-right btn btn-sm btn-primary">Add New</a>
            </div>
        <div class="card-body table-responsive">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Alamat</th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Alamat</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                </tbody>
               </table> 
                </div>
            </div>
        </div>
    </div>
@endsection

@section('assets-bottom')
<script src="{{ asset('assets/blog-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/blog-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets/blog-admin/vendor/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/blog-admin/vendor/datatables/responsive.bootstrap4.min.js') }}"></script>


<script>
    $(document).ready(function(){
        $("#dataTable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.datatable.users') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'user', name: 'user'},
                {data: 'email', name: 'email'},
                {data: 'role', name: 'role' },
                {data: 'alamat', name: 'alamat'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]                
        })
    });
</script>

@endsection
