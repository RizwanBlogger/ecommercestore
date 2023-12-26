@extends('admin.layout.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">

                            <div class="card-header" style="display: flex; justify-content: space-between;">
                                <span>Product Update</span>
                                <a href="{{ route('admin:product.list') }}" class="btn btn-success"
                                    style="margin-left: 78%;">Back</a>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="{{ route('admin:product.update', $edit->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    @error('productname')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @error('productprice')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @error('productdesc')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                    <div class="form-group" style="justify-content: center; display: flex; padding: 20px;">

                                        <input type="text" name="productname" class="form-control" id=""
                                            value="{{ $edit->productname ?? '' }}" placeholder="Enter Product name">

                                        <div style="width: 40px;"></div>

                                        <input type="number" name="productprice" class="form-control" id=""
                                            value="{{ $edit->productprice ?? '' }}" placeholder="Enter productprice">

                                            <div style="width: 40px;"></div>

                                            <input type="number" name="qty" class="form-control" id=""
                                            placeholder="Enter Product Qty" value="{{ $edit->qty ?? '' }}">

                                    </div>
                                    <div class="form-group" style="justify-content: center; display: flex; padding: 20px;">

                                        <select name="category_id" id="" class="form-control">
                                            <option>Select category</option>
                                            @foreach ($category as $data)
                                                <option value="{{ $data->id }}">{{ $data->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" style="justify-content: center; display: flex; padding: 20px;">

                                        <textarea class="form-control" name="productdesc" id="" cols="135" rows="10">{{ $edit->productdesc ?? '' }}</textarea>

                                    </div>

                                    <div class="form-group">

                                        <input type="file" name="image" class="form-control" id=""><br>





                                    </div>

                                    <img src="{{ asset('/image/product/' . $edit->image) }}" width="50px" alt="">
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
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
