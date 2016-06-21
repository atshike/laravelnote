<link rel="stylesheet" href="{{asset('resources/views/style/admin.css')}}">

    @if(session('msg'))
        <div class="msg">{{session('msg')}}</div>
    @endif

<form action="" method="post">
    {{csrf_field()}}
<div class="login">
    <li><span>用户名：</span><input type="text" name="user_name"></li>
    <li><span>密  码：</span><input type="text" name="user_pass"></li>
    <li><span>验证码：</span><input type="text" name="code"><img src="{{url('article/code')}}" title="点击更换验证码" onclick="this.src='{{url('/article/code')}}?'+Math.random()"></li>
    <li><input type="submit" value="登录"></li>
    </div>
</form>
