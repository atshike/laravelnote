
<form action="" method="post">
    {{csrf_field()}}

    @if(count($errors)>0)
        @if(is_object($errors))
            @foreach($errors->all() as $error)
                <h6>{{$error}}</h6>
            @endforeach
        @else
            <h6>{{$errors}}</h6>
        @endif
    @endif
<div>
    <li>旧 密 码：<input type="password" name="password0"></li>
    <li>新 密 码：<input type="password" name="password"></li>
    <li>确认密码：<input type="password" name="password_confirmation"></li>
    <li><input type="submit" value="提交"></li>
</div>
</form>