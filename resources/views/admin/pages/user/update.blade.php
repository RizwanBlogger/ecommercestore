@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
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
  <span>User Update</span>
  <a href="{{ route('admin:user.list') }}" class="btn btn-success" style="margin-left: 78%;">Back</a>
</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{route('admin:user.update',$edit->id)}}" method="post">
                @csrf
                <div class="card-body">
                @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                   
                  <div class="form-group" style="justify-content: center; display: flex; padding: 20px;">
                 
                    <input type="text" name="name" value="{{$edit->name ?? '' }}" class="form-control" id="" placeholder="Enter name">
                   
                    <div style="width: 40px;"></div>
                   
                    <input type="email" name="email" value="{{$edit->email ?? '' }}" class="form-control" id="" placeholder="Enter email">
                   
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