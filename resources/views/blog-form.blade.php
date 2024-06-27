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
                <h3 class="card-title">Blog Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal form-border" method="post" action="{{url('insert_blog_form')}}" ecctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >Title</label>
                    <input type="text" class="form-control" placeholder="Title" name="title">
                  </div>
                  <div class="form-group">
                    <label>Slug</label>
                    <input type="text" class="form-control"  placeholder="slug" name="slug">
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <input type="text" class="form-control"  placeholder="Category" name="category">
                  </div>
                  <div class="form-group">
                    <label>SubCategory</label>
                    <input type="text" class="form-control"  placeholder="Subcategory" name="subcategory">
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
            </div>
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