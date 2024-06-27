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
                <h3 class="card-title">Food Menu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal form-border" action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >Title</label>
                    <input type="text" class="form-control" placeholder="Title" name="title" required>
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control"  placeholder="Image" name="image" required>
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="num" class="form-control"  placeholder="price" name="price" required>
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" placeholder="Description" name="description"></textarea>
                  </div>
                                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>


              <section class="content">
                <div class="card">
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th>Sr.no</th>
                                    <th>Food name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                    <th>Action2</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($data as $data)
                                <tr>
                                  <td>{{$data->id}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->price}}</td>
                                    <td>{{$data->description}}</td>
                                    <td><img style="width: 100%" src="foodimage/{{$data->image}}"></td>

                                     <td><a href="{{url('editfood/'.$data->id)}}">Edit</a></td>

                                    <td><a href="{{url('deletefood/'.$data->id)}}">Delete</a></td>
                                    
                                   
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.card -->

           
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      <!-- /.container-fluid -->
    </section>
        </div>

    </div>
</div>


@endsection