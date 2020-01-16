@extends('admin.layouts.dashboard')

@section('content')

<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">                    
                <div class="card">
                    <div class="card-header">
                        <h1>Quản lý đơn hàng</h1>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Mã khách hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr style="text-align: center">
                                        <td>{{ $loop->index }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user_id }}</td>
                                        {{-- <td>{{ $order->user->name }}</td> --}}
                                        <td>{{ $order->total_money }}</td>
                                        <td>{{ $order->created_at->format('d/m/y') }}</td>
                                        <td>
                                            @if ($order->status == '1')
                                                {{"Mới tiếp nhận đơn hàng"}}
                                            @elseif($order->status == '2')
                                                {{"Đang giao hàng"}}
                                            @elseif($order->status == '3')
                                                {{"Giao hàng thành công"}}
                                            @elseif($order->status == '4')
                                                {{"Giao hàng thất bại"}}
                                            @endif 
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.orders.edit', $order) }}" 
                                                class="btn btn-success btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a id="btnDelete" onclick="putLinkDelete(this)" data-action ="{{ route('admin.orders.destroy', $order) }}" href="#popupDelete" class="btn btn-delete btn-danger btn-xs">
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
            <form action="#" id="form-del-orders" method ="POST">
                @csrf
                @method('DELETE')
                    <h2>Thông báo</h2>
                    <p>Bạn có chắc chắn muốn xóa?</p>
                    <button style="margin-right:15px" type="submit" class="btn btn-primary">Đồng ý</button>
                    <a href="{{ route('admin.orders.index') }}">
                        <button style="margin-left:15px" type="button" class="btn btn-danger">Hủy bỏ</button>
                    </a>
            </form>
        </div>
    </div><!-- /.container-fluid -->
    <!--End MainContent-->
@endsection
@push('scripts')
<script>

    function putLinkDelete(e){
        var url = $(e).data("action");
        $("#form-del-orders").attr('action', url);
    }

    $(document).ready(function(){
        
        $("#example2").DataTable();
    });
    </script>
@endpush
