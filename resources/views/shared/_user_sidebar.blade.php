<div class="panel panel-default">
	<ul class="list-group">
		<li class="list-group-item">
			<image src="{{$data['image']?$data['image']:'/img/admin.jpg'}}" class="img-responsive img-thumbnail center-block" ></image>
		</li>
		<li class="list-group-item">
			
			<p><span class="glyphicon glyphicon-user"></span>{{$data['name']?$data['name']:Auth::user()->email}}</p>
		</li>
		<li class="list-group-item">
			<h4>简介</h4>
			<p>{{$data['content']?$data['content']:'此人很懒，没有留下信息'}}</p>
		</li>
		@if(isset($content->user_id))
		@if(Auth::id() != $content->user_id)
		<li class="list-group-item">

			<form methed="get" action="{{route('odd.edit',$content->user_id)}}">
				{{csrf_field()}}
				<button type="submit" class="btn btn-primary btn-block">关注</button>
				
			</form>
		</li>
		@endif
		@endif
	</ul>
</div>

