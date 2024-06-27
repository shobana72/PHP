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
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Food Menu</h3>
                                </div>
                                <form class="form-horizontal form-border" action="{{url('updatechef/'.$data->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                     <div class="card-body">
                  <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$data->name}}" required>
                  </div>
                  <div class="form-group">
                    <label>Speciality</label>
                    <input type="text" name="speciality" class="form-control"  placeholder="Enter the speciality" value="{{$data->speciality}}">
                  </div>

                  <div class="form-group">
                                            <label>Old image</label>
                                            <img height="200" width="200" src="{{ asset('chefimage/'.$data->image) }}">
                                        </div>
                                        <div class="form-group">
                                            <label>New Image</label>
                                            <input type="file" class="form-control" placeholder="Image" name="image">
                                        </div>
                 
                 
                                  </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
