@extends('layouts.default')
@section('title','信息修改')
@section('link')
<link rel="stylesheet" href="/css/fileinput.min.css">
@endsection
@section('content')
<div class="col-md-8 col-md-offset-2">
@include('shared._error')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h5>信息修改</h5>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" method="post" action="{{route('user.update',Auth::id())}}" enctype="multipart/form-data">
			{{method_field('PATCH')}}
			{{csrf_field()}}
				<div class="form-group">
					<label class="control-label col-sm-2">用户名</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="name" value="{{$data['name']}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">邮箱</label>
					<div class="col-sm-10">
						<input type="text" class="form-control"
						name="eamil" disabled  value="{{Auth::user()->email}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">头像</label>
					<div class="col-sm-10">
						<div class="btn btn-default btn-file col-sm-3" id="file">
							<span class="glyphicon glyphicon-paperclip"></span>导入头像图片
							<input name="image" id="fileUpload" type="file" class="file">

						</div>
						<p class="help-block col-sm-9">请使用*.jpg格式</p>
					
						<div id="user_image">
							<div id="image_holder">
								<image class="img-thumb" src="{{Auth::user()->image}}"></image>
							</div>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">简介</label>
					<div class="col-sm-10">
						<textarea  class="form-control" rows="5" style="overflow:hidden" name="content">{{$data['content']}}</textarea>
						<div class="help-block">少于500字</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2 col-sm-offset-2">
					<button type="submit" class="btn btn-primary col-sm-12">更新</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('script')
function getFileName(o){
    var pos=o.lastIndexOf("\\");
    return o.substring(pos+1);  
}

$("#fileUpload").on("change", function () {
	 $("#image_holder").empty();
    str=$(this).val();
    name=getFileName(str);
    $("#image_holder").append(name);
});
@endsection