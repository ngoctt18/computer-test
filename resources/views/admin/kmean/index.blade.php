@extends('admin.layouts.dashboard')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">                    
                    <div class="card">
                        <div class="card-header">
                            <h1>Kmean</h1>
                        </div>
                        <!-- /.card-header -->
                        {{-- @if (session('notification'))
                            <div class="alert alert-danger">
                                {{session('notification')}}
                            </div>
                        @endif --}}
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Mã sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Thời hạn bảo hành</th>
                                        <th>Mã hãng</th>
                                        <th>Mã danh mục</th>
                                        <th data-sort="desc">Nhóm/cụm được phân</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $rules as $key => $value )
                                        @foreach ( $value as $key2 => $value2 ) 
                                            <tr>   
                                                <td>{{ $key2}}</td>
                                                <td>{{ $value2['0'] }}</td>
                                                <td>{{ $value2['1'] }}</td>
                                                <td>{{ $value2['2'] }}</td>
                                                <td>{{ $value2['3'] }}</td>
                                                <td>{{ $key }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $("#example2").DataTable();
        });
    </script>
@endpush