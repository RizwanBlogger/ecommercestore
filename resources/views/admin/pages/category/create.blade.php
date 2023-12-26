@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
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
  <span>Category Create</span>
  <a href="{{ route('admin:category.list') }}" class="btn btn-success" style="margin-left: 78%;">Back</a>
</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{route('admin:category.submit')}}" method="post">
                @csrf
                <div class="card-body">
                @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                   
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="" placeholder="Enter name">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" >Submit</button>
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