@extends('layout.admin')
@section('content')

<div class="body">
    @include('include.header')

    <div class="inner-wrapper">
        @include('include.side')

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Reservation Report</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
             <section class="content">
                <div class="card">
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Message</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($data as $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->date}}</td>
                                    <td>{{$data->time}}</td>
                                    <td>{{$data->message}}</td>

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

       

    </div>
</div>


@endsection