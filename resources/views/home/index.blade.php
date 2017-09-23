@extends('layouts.default')
@section('tilte','首页')
@section('content')
<div class="col-md-3 pull-right">
	@include('shared._article_sidebar')
</div>
<div class="col-md-8">
	
	
    @foreach ($contents as $content)
        <div class="list-group" >
			<a href="{{route('article.show',$content->id)}}" class="list-group-item " >
				<div  style="overflow:hidden;max-height:300px;text-overflow:ellipsis;">
				    <h3 class="list-group-item-heading">{{$content->title}}</h3>
				    <p>{{$content->created_at->diffForHumans()
}}</p>

				    {!! $content->content !!}
			    </div>
		  	</a>
		</div>

    @endforeach
	

{{ $contents->links() }}
</div>
@endsection
