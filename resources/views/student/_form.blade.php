<form class="form-horizontal" method="post" action="">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">名前</label>

        <div class="col-sm-5">
            <input type="text" class="form-control"name="Student[name]"
                   value="{{old('Student')['name'] ? old('Student')['name']:$student->name}}"
                   id="name" placeholder="学生の名前を入力してください">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('Student.name')}}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="age" class="col-sm-2 control-label">年齢</label>

        <div class="col-sm-5">
            <input type="text" class="form-control"
                   value="{{old('Student')['age']?old('Student')['age'] : $student->age}}"
                   name="Student[age]" id="age" placeholder="学生の年齢を入力してください">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('Student.age')}}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">性別</label>

        <div class="col-sm-5">
            @foreach($student->sex() as $ind=>$val)
                <label class="radio-inline">
                    <input type="radio" name="Student[sex]"
                           {{isset($student->getsex) && $student->getsex ==$ind ? 'checked':'' }}
                           value="{{$ind}}"> {{$val}}
                </label>
            @endforeach
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('Student.sex')}}</p>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">提出</button>
        </div>
    </div>
</form>