@extends('layouts.default')
@section('title','发布文章')
@section('link')
<link href="/ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/ueditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" src="/ueditor/third-party/template.min.js"></script>
<script src="/ueditor/umeditor.config.js"></script>
<script src="/ueditor/umeditor.min.js"></script>
<script src="/ueditor/lang/zh-cn/zh-cn.js"></script>
@endsection
@section('content')
<div class="col-md-3">
	@include('shared._user_sidebar')
</div>
<div class="col-md-7 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-body">
		@include('shared._error')
			<form method="post" action="{{route('article.store')}}">
			{{ csrf_field() }}

				<div class="form-group">
					<label >文章标题</label>
					<input class="form-control" name="title">
				</div>
				<div class="form-group">
					<label>文章正文</label>
					<div class="hidden">
						<input name="content" id="content">
					</div>
					<script id="myEditor" name="text" type="text/plain" style="width:600px;height:300px;"></script>
				</div>
				<div class="form-group" >
					<div class="col-sm-3 pull-right">
						<button type="submit" class="btn btn-primary btn-block">发布</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('script')
var um = UM.getEditor('myEditor');

um.addListener('blur',function(){
		var val = UM.getEditor('myEditor').getPlainTxt();
        $('#content').val(val);
    });
@endsection