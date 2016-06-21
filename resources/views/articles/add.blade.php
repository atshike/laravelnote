<link rel="stylesheet" href="{{asset('resources/views/style/admin.css')}}">
<form action="" method="post">
    {{csrf_field()}}
<div>
    <li>标题：<input type="text" name="title"></li>
    <li>作者：<input type="text" name="author"></li>
    <li>内容：<input type="text" name="text"></li>
    <li><input type="submit"></li>
</div>
 </form>