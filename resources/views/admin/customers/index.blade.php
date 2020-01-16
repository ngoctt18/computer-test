@extends('admin.layouts.dashboard')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">                    
                <div class="card">
                    <div class="card-header">
                        <h1>Quản lý khách hàng</h1>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Mã khách hàng</th>
                                    <th>Tên khách hàng</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Email</th>
                                    <th>Mật khẩu</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr style="text-align: center">
                                        <td>{{ $loop->index }}</td>
                                        <td>{{ $customer->code }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->username }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->created_at->format('d/m/y') }}</td>
                                        <td>
                                                @if ($customer->status == '1')
                                                    {{"Đang hoạt động"}}
                                                @elseif($customer->status == '2')
                                                {{"Tạm dừng hoạt động"}}
                                                @elseif($customer->status == '3')
                                                {{"Dừng hoạt động"}}
                                                @endif    
                                                </td>
                                        <td>
                                            <a href="{{ route('admin.customers.edit', $customer) }}" 
                                                class="btn btn-success btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a id="btnDelete" onclick="putLinkDelete(this)" data-action ="{{ route('admin.customers.destroy', $customer) }}" href="#popupDelete" class="btn btn-delete btn-danger btn-xs">
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
            <form action="#" id="form-del-customers" method ="POST">
                @csrf
                @method('DELETE')
                    <h2>Thông báo</h2>
                    <p>Bạn có chắc chắn muốn xóa?</p>
                    <button style="margin-right:15px" type="submit" class="btn btn-primary">Đồng ý</button>
                    <a href="{{ route('admin.customers.index') }}">
                        <button style="margin-left:15px" type="button" class="btn btn-danger">Hủy bỏ</button>
                    </a>
            </form>
        </div>
    </div>
    <!--End MainContent--> --}}
@endsection
@push('scripts')
    <script>
        function putLinkDelete(e){
            var url = $(e).data("action");
            $("#form-del-customers").attr('action', url);
        }

        $(document).ready(function(){
            
            $("#example2").DataTable();
        });
    </script>
@endpush