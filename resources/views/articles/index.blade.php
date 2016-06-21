<link rel="stylesheet" href="{{asset('resources/views/style/admin.css')}}">
<h1>新闻首页</h1>
<div><a href="{{url('article/pass')}}">修改密码</a></div>
@foreach($list as $k)

    {{$k->title}} <br />
@endforeach
<div class="page">
{{$list->links()}}
</div>