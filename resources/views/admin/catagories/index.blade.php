@extends('admin.layouts.dashboard')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">                    
                <div class="card">
                    <div class="card-header">
                        <h1>Quản lý danh mục</h1>
                        <a href="{{ route('admin.catagories.create') }}" class="btn btn-primary">Thêm mới</a>
                    </div>
                    @if (session('notification'))
                    <div class="alert alert-danger">
                        {{session('notification')}}
                    </div>
                @endif
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Ảnh</th>
                                    <th>Mã danh mục</th>
                                    <th>Tên danh mục</th>
                                    <th>Ngày tạo</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($catagories as $catagory)
                                    <tr style="text-align: center">
                                        <td>{{ $loop->index }}</td>
                                        <td>
                                            <image style="width:50px;height:50px" src="{{asset($catagory->image) }}" />
                                        </td>
                                        <td>{{ $catagory->code }}</td>
                                        <td>{{ $catagory->name }}</td>
                                        <td>{{ $catagory->created_at->format('d/m/y')}}</td>
                                        <td>
                                            <a href="{{ route('admin.catagories.edit', $catagory) }}" 
                                                class="btn btn-success btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a id="btnDelete" onclick="putLinkDelete(this)" data-action ="{{ route('admin.catagories.destroy', $catagory) }}" href="#popupDelete" class="btn btn-delete btn-danger btn-xs">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            <!-- /.card -->
            </div>
        </div>
        <div  id="popupDelete" style="text-align: center; border-radius:5px; display: none">
            <form action="#" id="form-del-catagories" method ="POST">
                @csrf
                @method('DELETE')
                    <h2 >Thông báo</h2>
                    <p>Bạn có chắc chắn muốn xóa?</p>
                    <button style="margin-right:15px" type="submit" class="btn btn-primary">Đồng ý</button>
                    <a href="{{ route('admin.catagories.index') }}">
                        <button style="margin-left:15px" type="button" class="btn btn-danger">Hủy bỏ</button>
                    </a>
            </form>
        </div>
    </div><!-- /.container-fluid -->

@endsection
@push('scripts')
<script>
    function putLinkDelete(e){
        var url = $(e).data("action");
        $("#form-del-catagories").attr('action', url);
    }
    
    // $("#example1").DataTable({
    // "paging": true,
    // "lengthChange": false,
    // "searching": false,
    // "ordering": true,
    // "info": true,
    // "autoWidth": false
    // });

    $(document).ready(function(){
        
        $("#example2").DataTable();
    });
</script>
@endpush