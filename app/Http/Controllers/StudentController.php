<?php
namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //学生リスト
    public function index()
    {
        $students=Student::paginate(4);

        return view('student.index',[
            'students'=>$students,
        ]);
    }
    //データ挿入
    public function create(Request $request)
    {
        $student = new Student();

        if($request->isMethod('POST')){


            //コントロール検証
           /* $this->validate($request,[
               'Student.name'=>'required|min:2|max:20',
               'Student.age'=>'required|integer|',
               'Student.sex'=>'required|integer',
            ],[
                'required'=>':attribute 空ではいけません',
                'min'=>':attribute 規定の長さに満足しない',
                'integer'=>'整数でなければいけない',
            ],[
                'Student.name'=>'名前',
                'Student.age'=>'年齢',
                'Student.sex'=>'性別',
            ]);*/

            //2.クラス検証
            $validator=\Validator::make($request->input(),[
                'Student.name'=>'required|min:2|max:20',
                'Student.age'=>'required|integer|',
                'Student.sex'=>'required|integer',
            ],[
                'required'=>':attribute 空ではいけません',
                'min'=>':attribute 規定の長さに満足しない',
                'integer'=>'整数でなければいけない',
            ],[
                'Student.name'=>'名前',
                'Student.age'=>'年齢',
                'Student.sex'=>'性別',
            ]);
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $dada=$request->input('Student');

            if(Student::create($dada)){
                return redirect('student/index')->with('success','挿入成功');
            }else{
                return redirect()->back();
            }
        }

        return view('student.create',["student"=>$student]);

    }
    //データ保存
    public function save(Request $request)
    {
        $data=$request->input('Student');

        $student= new Student();
        $student->name=$data['name'];
        $student->age=$data['age'];
        $student->sex=$data['sex'];

        If($student->save()){
            return redirect('student/index');
        }else{
            return redirect()->back();
        };

    }

    //データ更新
    public function update(Request $request,$id)
    {

        $student=Student::find($id);

        if($request->isMethod('POST'))
        {
            $this->validate($request,[

                'Student.name'=>'required|min:2|max:20',
                'Student.age'=>'required|integer|',
                'Student.sex'=>'required|integer',
            ],[
                'required'=>':attribute 空ではいけません',
                'min'=>':attribute 規定の長さに満足しない',
                'integer'=>'整数でなければいけない',
            ],[
                'Student.name'=>'名前',
                'Student.age'=>'年齢',
                'Student.sex'=>'性別',
            ]);

            $data=$request->input('Student');

            $student->name=$data['name'];
            $student->age=$data['age'];
            $student->sex=$data['sex'];

            if($student->save()){
                return redirect('student/index')->with('success','修正出来ました-'.$id);
            }
        }
        return view('student.update',[
            "student"=>$student
        ]);
    }

    //詳細
    public function detail($id)
    {
        $student= Student::find($id);


        return view('student.detail',[

            'student'=>$student

        ]);

    }
    //データ削除
    public function delete($id)
    {
        $student = Student::find($id);

        if($student->delete()){

            return redirect('student/index')->with('success','削除しました-' . $id);
        }else{
            return redirect('student/index')->with('error','削除失敗しました');
        }


    }

}
