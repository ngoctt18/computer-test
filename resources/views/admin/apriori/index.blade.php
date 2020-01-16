@extends('admin.layouts.dashboard')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">                    
                    <div class="card">
                        <div class="card-header">
                            <h1>Apriori</h1>
                        </div>
                        <!-- /.card-header -->
                        @if (session('notification'))
                            <div class="alert alert-danger">
                                {{session('notification')}}
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <div class="row">
                                            <div class="col-12">
                                                <label class="col-form-label" for="">Choose time training</label>
                                            </div>
                                            <div class="col-12">
                                                <select class="custom-select" id="time-training" name="time">
                                                <option value="1" selected="selected">One month ago</option>
                                                <option value="2">Two month ago</option>
                                                <option value="3">Three month ago</option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="row">
                                            <div class="col-12">
                                                <label class="col-form-label" for="">Min sup</label>
                                            </div>
                                            <div class="col-12">
                                                <input name="support" type="number" min="0.1" max="1" step="0.1" class="form-control" id="support" value="0.3" required="">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="row">
                                            <div class="col-12">
                                                <label class="col-form-label" for="">Min conf</label>
                                            </div>
                                            <div class="col-12">
                                                <input name="conf" type="number" min="0.1" max="1" step="0.1" class="form-control" id="conf" value="0.5" required="">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="row">
                                            <div class="col-12">
                                                <label class="col-form-label" style="color: transparent" for="">,</label>
                                            </div>
                                            <div class="col-12">
                                                <button id="apriori-training" class="btn btn-primary"><i class="fas fa-spinner fa-pulse"></i> Training</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Sản phẩm</th>
                                <th>Phụ kiện</th>
                                <th>Hỗ trợ</th>
                                <th>Độ tin cậy</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($rules as $rule)
                                    <tr>   
                                        <td>{{ (($loop->index) +1) }}</td>
                                        <td> 
                                            {{-- {{$rule->antecedent}} --}}
                                            
                                            {{(implode(", " , $rule['antecedent']))}}
                                            {{-- @foreach ( $rule['antecedent'] as $item)
                                                {{ $item }}
                                            @endforeach --}}
                                        </td>
                                        <td>
                                                {{-- {{$rule->consequent}} --}}
                                            {{(implode(", " , $rule['consequent']))}}
                                            {{-- @foreach ( $rule['consequent'] as $item1)
                                                {{ $item1 }}
                                            @endforeach --}}
                                        </td>
                                        <td>
                                            {{ $rule['support'] }}
                                        </td>
                                        <td>
                                            {{ $rule['confidence'] }}
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
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection