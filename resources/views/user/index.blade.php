@extends('layouts.default')
@section('title','用户中心')
@section('content')
<div class="col-md-3">
	@include('shared._user_sidebar')
</div>
<div class="col-md-7 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-body">
			<ul class="nav nav-tabs" id="tabs">
				<li role="presentation" class="active"><a href="#">动态</a></li>
				<li role="presentation"><a href="#">文章</a></li>
				<li role="presentation"><a href="#">关注</a></li>
				<li role="presentation"><a href="#">赞过</a></li>
				<li role="presentation"><a href="#">粉丝</a></li>
			</ul>
			
		</div>
		<div class="panel-body">
		<h3 class="text-center">nothing</h3>
			<ul class="user">
				<li>
					
				</li>
			</ul>
		</div>
	</div>
</div>
@endsection
