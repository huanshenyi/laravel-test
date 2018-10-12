@extends('common.layouts')

@section('content')

    @include('common.message')


    <!-- メインフォーム -->
    <div class="panel panel-default">
        <div class="panel-heading">学生リスト</div>
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>年齢</th>
                <th>性別</th>
                <th>挿入時間</th>
                <th width="120">操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($students as $student)
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->age}}</td>
                <td>{{$student->sex($student->sex)}}</td>
                <td>{{$student->created_at}}</td>
                <td>
                    <a href="{{url('student/detail',['id'=>$student->id])}}">詳細</a>
                    <a href="{{url('student/update',['id'=>$student->id])}}">修正</a>
                    <a href="{{url('student/delete',['id'=>$student->id])}}"

                    onclick="if(confirm('削除しますか?')==false) return false;">削除</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- ページング  -->
    <div>
        <div class="pull-right">
            {{ $students->render() }}
        </div>
    </div>

@stop