<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel学生フォーム @yield('title')</title>
    <!-- Bootstrap CSS ファイルの読み取り -->
    <link rel="stylesheet" href="{{asset('static/bootstrap/css/bootstrap.min.css')}}">
    @section('style')

    @show
</head>
<body>

<!-- ヘット -->
@section('header')
 <div class="jumbotron">
    <div class="container">
        <h2>Laravel学生管理フォーム</h2>

        <p> - Laravelフォーム</p>
    </div>
 </div>
@show

<!-- 中央内容エリア -->
<div class="container">
    <div class="row">

        <!-- 左メニューエリア   -->
        <div class="col-md-3">
            @section('leftmenu')
             <div class="list-group">
                 <a href="{{url('student/index')}}" class="list-group-item
                 {{Request::getPathInfo() !=='/student/create'?'active':''}}
                 ">学生リスト</a>
                 <a href="{{url('student/create')}}" class="list-group-item
                 {{Request::getPathInfo()=='/student/create'?'active':''}}
                 ">学生挿入</a>
             </div>
            @show
        </div>

        <!-- 左内容エリア -->
        <div class="col-md-9">

          @yield('content')

        </div>
    </div>
</div>

<!-- フッター -->
@section('footer')
 <div class="jumbotron" style="margin:0;">
     <div class="container">
         <span>  @2018/10 txy</span>
     </div>
 </div>
@show

<!-- jQuery  -->
<script src="{{asset('static/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap JavaScript  -->
<script src="{{asset('static/bootstrap/js/bootstrap.min.js')}}"></script>
@section('javascript')

    @show
</body>
</html>