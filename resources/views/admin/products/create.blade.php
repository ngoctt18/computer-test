@extends('admin.layouts.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm mới sản phẩm</h1>
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
                    <h3 class="card-title">Thêm mới</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="layer">
                                    <div class="form-group">
                                        <label for="">Ảnh</label>
                                        <div class="img_this_upload">
                                            <input class="files" type="file" accept="image/*" value="{{old('images')}}" multiple name="image[]"/>
                                            <div class="selectedFiles row"></div>
                                        </div>
                                    </div>
                                <!-- <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                                <input type="file" class="files" name="files"  accept="image/*" style="display: block; height:38px" multiple>
                                <div class="selectedFiles row">
                                </div> -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                @foreach ($errors->all() as $error)
                                <label class="text text-danger">{{$error}}</label> <br>
                                @endforeach
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Mã sản phẩm (*)</label>
                                    <input name="code" type="text" class="form-control" id="code" placeholder=" Mã sản phẩm" value="{{old('code')}}">
                                    {{-- <span class="text-danger" >{{$errors->first('code')}}</span> --}}
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="price">Giá mới(*)</label>
                                    <input name="price" type="text" class="form-control" id="price" placeholder="Giá "value="{{old('price')}}">
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Số lượng (*)</label>
                                    <input name="quantity" type="text" class="form-control" id="quantity" placeholder="Số lượng" value="{{old('quantity')}}">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="warranty">Bảo hành (*)</label>
                                    <input name="warranty" type="text" class="form-control" id="warranty" placeholder="Bảo hành" value="{{old('warranty')}}">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="brand_id">Hãng </label>
                                        <select name="brand_id" id="brand_id" class="form-control">
                                            @foreach ($brands as $brand)
                                                <option 
                                                    value="{{ $brand->id }}" 
                                                    {{old('status') == '1' ? 'selected' : ''}}>
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="year">Năm sản xuất (*)</label>
                                    <input name="year" type="text" class="form-control" id="year" placeholder="Năm sản xuất" value="{{old('year')}}">
                                </div>
                                <div class="form-group">
                                    <label for="detail">Tính năng</label>
                                    <textarea name="feature" id="feature" class="form-control" rows="5">{{old('feature')}}</textarea>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{old('status') == '1' ? 'selected' : ''}}>Đang sale</option>
                                        <option value="2" {{old('status') == '2' ? 'selected' : ''}}>Mới về</option>
                                        <option value="3" {{old('status') == '3' ? 'selected' : ''}}>Sắp về</option>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="name">Tên sản phẩm (*)</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Tên sản phẩm" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="price_new">Giá cũ</label>
                                    <input name="price_new" type="text" class="form-control" id="price_new" placeholder="Giá cũ" value="{{old('price_new')}}">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="color">Màu sắc</label>
                                    <input name="color" type="text" class="form-control" id="color" placeholder="Màu sắc" value="{{old('color')}}">
                                </div>
                                <div class="form-group">
                                    <label for="catagory_id">Danh mục sản phẩm</label>
                                    <select name="catagory_id" id="catagory_id" class="form-control">
                                        @foreach ($catagories as $catagory)
                                        <option 
                                            value="{{ $catagory->id }}" 
                                            {{old('status') == '1' ? 'selected' : ''}}>
                                            {{ $catagory->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="detail">Cách dùng</label>
                                    <textarea name="use" id="use" class="form-control" rows="5">{{old('use')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="detail">Thông tin sản phẩm</label>
                                    <textarea name="detail" id="detail" class="form-control" rows="5">{{old('detail')}}</textarea>
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
                                <a href="{{ route('admin.products.index') }}">
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
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


@push('scripts')
    <script>
    //  Thêm ảnh
    var storedFiles = [];
    $(".files").on("change", function (e) {
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        var selDiv = $(this).next();
        filesArr.forEach(function (f) {
            if (!f.type.match("image/*")) {
                return;
            }
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementsByClassName("files").enable = true;
                var html =
                    '<div class="anh col-sm-2">'+
                    '<img src="' +
                    e.target.result 
                    +'"/>'+
                    '<br clear="left"/>'+
                    '<i class="fa fa-times-circle" aria-hidden="true"></i>'+'</div>';

                if(storedFiles.length == 3){
                    document.getElementsByClassName("files").disabled = true;
                  
                    selDiv.append(html);
                }
                else{
                    document.getElementsByClassName("files").disabled = false;
                    storedFiles.push(e.target.result);
                    selDiv.append(html);
                }
            };
            reader.readAsDataURL(f);
        });
        // $(this).val("");
    });

    // xóa ảnh
    function removeFile(){
    
    var file = $(this).siblings("img").attr("src");
    for (var i = 0; i < storedFiles.length; i++) {
        if (storedFiles[i] === file) {
            storedFiles.splice(i, 1);
            break;
        } 
    }
    $(this).parent().remove();
    // $(".files").attr("disabled","false")
    
    document.getElementsByClassName("files").disabled = false;

}
    $("body").on("click", ".fa-times-circle", removeFile);
    </script>
@endpush
