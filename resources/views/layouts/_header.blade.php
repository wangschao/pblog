<nav class="navbar navbar-fix-top navbar-inverse">
	<div class="container">
		<a href="{{route('index')}}" class="navbar-brand" id="logo">MyBlog</a>
		
		<ul class="nav navbar-nav navbar-right">
		@if(Auth::guest())
			<li><a href="{{route('login')}}">登陆</a></li>
			<li><a href="{{route('register')}}">注册</a></li>
		@else
			<li class="dropdown">
                <a  href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                    {{Auth::user()->email }} 
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dLabel">
                	<li>
                        <a href="{{route('user.index')}}">
                            个人中心
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                    	<a href="{{route('user.edit',Auth::id())}}">
                    		信息修改
                    	</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{route('article.create')}}">
                            发布文章
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            退出登陆
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
		@endif
		</ul>
	</div>
</nav>