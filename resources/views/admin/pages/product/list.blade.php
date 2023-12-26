@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
    
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="display: flex; justify-content: end;">
               
                <a href="{{route('admin:product.create')}}"  class="btn btn-primary">Create Product</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @foreach($product as $data)
                  <tr>
                    <td>{{$i++}}</td>
                    <td><img src="{{asset('/image/product/'.$data->image)}}" width="50px"></td>
                    <td>{{$data->productname ?? ''}}
                    </td>
                    <td>{{$data->productprice ?? ''}}
                    </td>
                    <td> <a href="{{route('admin:product.edit',$data->id)}}" class="btn btn-info">
                    <i class="fas fa-pen"></i>
                  </a> 
                  <a data-id="{{ $data->id }}" class="btn btn-danger" data-action="{{ url('/admin/product/delete', $data->id) }}"onclick="deleteConfirmation({{ $data->id }})"> <i class="fas fa-trash"></i></a>
                  <!-- <a href="{{route('admin:user.delete',$data->id)}}" class="btn btn-danger">
                    <i class="fas fa-trash"></i> -->
                  </a>
                </td>
                  </tr>
                 @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
      </div>
    </div>
</section>
</div>
@endsection
<script type="text/javascript">
    function deleteConfirmation(id) {
        swal.fire({
            title: 'Are you sure you want to delete',
            text: "Are you sure you want to delete",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
        }).then(function(e) {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/admin/product/delete') }}/" + id,
                    data: {
                        _token: CSRF_TOKEN
                    },
                    dataType: 'JSON',
                    success: function(results) {
                        swal.fire({
                            title: "Done",
                            icon: 'success',
                            text: "Data Deleted Successfully",
                            type: "success"
                        }).then(function() {
                            location.reload();
                        });
                    }
                });

            } else {
                e.dismiss;
            }

        }, function(dismiss) {
            return false;
        })
    }
</script>