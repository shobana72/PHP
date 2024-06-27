@extends('layout.admin')
@section('content')

<div class="body">
    @include('include.header')

    <div class="inner-wrapper">
        @include('include.side')

        <div class="content-wrapper">
            <section class="content pt-5">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form class="form-horizontal form-border" method="post" action="{{url('/uploadchef')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Enter name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Speciality</label>
                                            <input type="text" name="speciality" class="form-control" placeholder="Enter the speciality" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image" required>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->

                        <div class="col-md-12">
                            <!-- chefs list -->
                            <section class="content">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Sr.no</th>
                                                    <th>Chef Name</th>
                                                    <th>Speciality</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $index => $chef)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $chef->name }}</td>
                                                    <td>{{ $chef->speciality }}</td>
                                                    <td><img style="width: 100px; height: auto;" src="{{ asset('chefimage/' . $chef->image) }}" alt="Chef Image"></td>
                                                    <td>
                                                        <a href="{{ url('editchef/' . $chef->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('deletechef', $chef->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </section>
                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
        </div>
    </div>
</div>

@endsection
