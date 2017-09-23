@extends('layouts.default')
@section('title','文章')
@section('content')
	<div class="col-md-3 pull-right">
		@include('shared._article_sidebar')
	</div>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-body">
				<div  style="overflow:hidden;">
					<h1 class="text-center">{{$content->title}}</h1>
					<p>发布时间：{{$content->created_at}}</p>
					{!!$content->content!!}
				</div>
				<div class="btn-group pull-right">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upvote">
						点赞 <span class="badge">3</span>			
					</button>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#collect">
						收藏 <span class="badge">3</span>			
					</button>
				</div>
			</div>
		</div>
		<div>
		@foreach($comments as $comment)
			<div class="list-group">
				<h5 class="list-group-item">{{$comment->user}}</h5>
				<p class="list-group-item">{{$comment->text}}</p>
			</div>
		@endforeach
		{{$comments->links()}}
			<form method="post" action="{{route('odd.store')}}">
			{{csrf_field()}}
				<div class="form-group">
					<lable><span class="glyphicon glyphicon-user"></span> {{$user->name?$user->name:Auth::user()->email}}</lable>
					<textarea name="comment" class="form-control" style="height:150px;resize:none;"></textarea>
				</div>
				<div class="hidden">
					<input name="article_id" value="{{$content->id}}"></div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-comment"></span> 评论</button>
				</div>
			</form>
		</div>
	</div>

<div class="modal fade" id="upvote" tabindex="-1">
	<div class="modal-dialog modal-sm">
		<div class="modal-content" >
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span">&times;</span></button>

			</div>
			<div class="modal-body">
			dfg
			</div>
		</div>
	</div>
</div>
<div class="modal fade" tabindex="-1" id="collect" >
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
	    	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span">&times;</span></button>

			</div>
			<div class="modal-body">
				dfg
			</div>
		</div>
	</div>
</div>



@endsection