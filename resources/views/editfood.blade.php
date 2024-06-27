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
                                <form class="form-horizontal form-border" action="{{url('update/'.$data->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" placeholder="Title" name="title" value="{{$data->title}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Old image</label>
                                            <img height="200" width="200" src="{{ asset('foodimage/'.$data->image) }}">
                                        </div>
                                        <div class="form-group">
                                            <label>New Image</label>
                                            <input type="file" class="form-control" placeholder="Image" name="image">
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="number" class="form-control" placeholder="Price" name="price" value="{{$data->price}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" placeholder="Description" name="description">{{$data->description}}</textarea>
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
