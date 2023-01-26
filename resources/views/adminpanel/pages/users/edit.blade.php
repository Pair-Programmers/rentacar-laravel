@extends('adminpanel.layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Advanced Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Advanced Form</li>
                        </ol>
                    </div>
                    @foreach ($errors->all() as $error)
                        <p style="color: red;">{{ $error }}</p>
                    @endforeach
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Select2 (Default Theme)</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form method="POST" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input required type="name" name="name" value="{{$user->name}}" class="form-control" id="inputName"
                                            placeholder="Enter name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputEmail">Email</label>
                                        <input required type="email" name="email" value="{{$user->email}}" class="form-control" id="inputEmail"
                                            placeholder="Enter email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputPassword">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            id="inputPassword" placeholder="Enter password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select required class="form-control select2" style="width: 100%;" name="role">
                                            @if ($user->role == 'Admin')
                                            <option disabled>Select</option>
                                            <option value="Admin" selected>Admin</option>
                                            <option value="User">User</option>
                                            @else
                                            <option disabled>Select</option>
                                            <option value="Admin" >Admin</option>
                                            <option value="User" selected>User</option>
                                            @endif

                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </form>
                </div>
            </div>

    </div>
@endsection
