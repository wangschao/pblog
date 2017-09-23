@extends('layouts.default')
@section('title','注册')
@section('content')
<div class="col-md-6 col-md-offset-3">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="text-center">注册</h4>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" method="post" action="{{route('register')}}">
			{{ csrf_field() }}
				<div class="form-group">
					<label class="col-sm-3  control-label">邮箱</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="email" value="{{old('email')}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3  control-label">密码</label>
					<div class="col-sm-8">
						<input type="password" class="form-control" name="password">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3  control-label">再次密码</label>
					<div class="col-sm-8">
						<input type="password" class="form-control" name="password_confirmation">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-5 col-sm-2">
						<button type="submit" class="btn btn-default">注册</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection