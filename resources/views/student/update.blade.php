@extends('common.layouts')

@section('content')

    @include('common.validator')
    <!-- 共有フォーム -->
    <div class="panel panel-default">
        <div class="panel-heading">学生データ修正</div>
        <div class="panel-body">
            @include('student._form')
        </div>
    </div>

@stop