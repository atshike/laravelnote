<link rel="stylesheet" href="{{asset('resources/views/style/admin.css')}}">



<table class="gridtable">
    <tr><th>序号</th><th> 类 目 </th><th>操作</th></tr>
@foreach($date as $k)
    <tr><td>{{$k->id}}</td><td>{{$k->_name}}</td><td>修改 / 删除</td></tr>
@endforeach
</table>