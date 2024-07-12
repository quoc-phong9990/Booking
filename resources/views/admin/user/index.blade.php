<!-- resources/views/admin/users/index.blade.php -->

@extends('admin.layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Users</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">List</a></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h1>Manage Users</h1>
                <div class="card">
                    <div class="card-header">{{$title}}</div>
                    <div class="card-body">
                       

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Avarta</th>
                                    <th>Date</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Role</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><img src="{{ $user->avarta }}" alt=""></td>
                                        <td>{{ $user->date_of_birth }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td> @php
                                            echo $user->role == 1
                                                ? '<span class="badge bg-primary-subtle text-primary text-uppercase">Admin</span>'
                                                : '<span class="badge bg-warning-subtle text-warning text-uppercase">User</span>';
                                        @endphp</td>
                                        <td>
                                            @php
                                                echo $user->is_active == 1
                                                    ? '<span class="badge bg-success-subtle text-success text-uppercase">Active</span>'
                                                    : '<span class="badge bg-success-subtle text-danger text-uppercase">Block</span>';
                                            @endphp
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-warning edit-item-btn showEdit"
                                                data-bs-toggle="modal" data-bs-target="#showModal"
                                                data-edit-role="{{ $user->role }}"
                                                data-edit-active="{{ $user->is_active }}"
                                                data-edit-id="{{ $user->id }}">Edit</button>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div id="formEdit">

                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.showEdit').click(function() {
                let id = $(this).attr('data-edit-id');
                let value = $(this).attr('data-edit-role');
                let active = $(this).attr('data-edit-active');
                let form = `
                    <form class="tablelist-form" autocomplete="off" action="{{ route('users.update') }}" method="post" >
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <h3>
                                Edit user
                                    </h3>
                                <input type="hidden" id="customername-field" class="form-control" name="id" value="${id}"
                                     >
                            </div>
                            
                        </div>
                        <div class="row justify-content-center"> 
                            <div class="col-4">
                                <label for="date-field" class="form-label">Admin
                                </label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="role"
                                ${value==1?'checked':''} value="1" id="role">
                            </div>
                            </div>
                            <div class="col-4">
                                <label for="date-field" class="form-label">Active
                                </label>
                                <div class="form-check form-switch">

                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="is_active"
                                        ${active==1?'checked':''}  value="1" id="is_active">
                                </div>

                            </div>
                        </div>
                 
                                                   

                        
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="add-btn">Update
                                    </button>
                            </div>
                        </div>
                    </form>`;
                $('#formEdit').html(form);
            });
        });
    </script>
@endsection
