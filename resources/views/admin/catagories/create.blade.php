@extends('admin.layouts.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm danh mục</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Thêm</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.catagories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--Main form-->
                        <div class="row">
                            <div class="col-md-6">
                                @if (count($errors) > 0 )
                                    <div class="form-group">
                                        @foreach ($errors->all() as $error)
                                        <label class="text text-danger">{{$error}}</label> <br>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="code">Mã danh mục</label>
                                    <input name="code" type="text" class="form-control" id="code" placeholder="Mã danh mục">
                                    {{-- <span class="text-danger" >{{$errors->first('code')}}</span> --}}
                                </div>
                                <div class="form-group">
                                    <label for="code">Ảnh</label>
                                    <div class=" upload-image">
                                        <img src="https://via.placeholder.com/300x150" alt="">
                                        <input name="image" type="file" id="picture" class="form-control">
                                        {{-- <span class="text-danger" >{{$errors->first('image')}}</span> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Tên danh mục">
                                    {{-- <span class="text-danger" >{{$errors->first('name')}}</span> --}}
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!--Button -->
                        <div class="row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{route('admin.catagories.index')}}">
                                    <button type="button" class="btn  btn-danger">Hủy bỏ</button>
                                </a>
                            </div>
                        </div>
                        <!--End Button -->
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('scripts')
    <script>
        $('#picture').change(function(e){
            console.log(this.files);
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.upload-image img').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }else{
                $('.upload-image img').attr('src', '{{asset('images/480x300.png')}}');
            }
        });
    </script>
@endpush