@extends('common.layouts')

@section('content')


<div class="panel panel-default">
    <div class="panel-heading">学生詳細</div>

    <table class="table table-bordered table-striped table-hover ">
        <tbody>
        <tr>
            <td width="50%">ID</td>
            <td>{{$student->id}}</td>
        </tr>
        <tr>
            <td>名前</td>
            <td>{{$student->name}}</td>
        </tr>
        <tr>
            <td>年齢</td>
            <td>{{$student->age}}</td>
        </tr>
        <tr>
            <td>性别</td>
            <td>{{$student->sex($student->sex)}}</td>
        </tr>
        <tr>
            <td>挿入時間</td>
            <td>{{$student->created_at}}</td>
        </tr>
        <tr>
            <td>最後の更新時間</td>
            <td>{{$student->updated_at}}</td>
        </tr>
        </tbody>
    </table>
</div>

    @stop
