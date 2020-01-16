@extends('admin.layouts.auth')

@push('styles')
    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
@endpush

@section('page')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b> Website bán máy tính</a>
    </div>
    <div class="card"> 
        <div class="card-body login-card-body">
            <p class="login-box-msg">Đăng nhập</p>
            <form action="{{ route('admin.login') }}" method="POST" role="form">
                @csrf
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    @if($errors->has('username'))
                        <small class="text-danger">{{ $errors->first('username') }}</small>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    @if($errors->has('password'))
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    @endif
                </div>
                <div class="row">
                    <div class="col-8">
                        {{-- <div class="checkbox icheck">
                            <label>
                                <input name="remember" type="checkbox"> Nhớ tài khoản
                            </label>
                        </div> --}}
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                    </div>
                </div>
            </form>

            {{-- <p class="mb-1">
                <a href="#">Quên mật khẩu</a>
            </p> --}}
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass   : 'iradio_square-blue',
                increaseArea : '20%' // optional
            })
        })
    </script>
@endpush
