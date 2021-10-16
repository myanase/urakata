<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Controllers\ClassAController;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    private $ClassAController;

    //インスタンス作成
    public function __construct(
        ClassAController $ClassAController
    ){
        $this->project = app()->make(Project::class);
        $classA = app()->make(ClassAController::class);
    }

    //プロジェクト一覧
    public function index(Request $request){
        // 現在ログインしているユーザーのID取得
        $user_id = Auth::id();
        //$user_id = $this->user_id;

        //ログイン中ユーザーに紐づく未削除のプロジェクトを取得
        $projects = $this->project::select('project_no','project_name', 'color')->where('user_id', $user_id)->where('del_flg', '0')->get();
        return view('project.project-list', ['projects' => $projects]);
    }

    //プロジェクト登録
    public function store(Request $request){
        // 現在ログインしているユーザーのID取得
        $user_id = Auth::id();

        //フォームからの入力値を取得
        $this->project->project_name = $request-> project_name;
        $this->project->user_id = $user_id;
        $this->project->genre = $request-> genre;
        $this->project->nendai = $request-> nendai;
        $this->project->memo = $request-> memo;
        $this->project->color = $request-> color;
        $this->project->series = $request-> series;
        $this->project->save();
        
        return redirect('/project-list')->with('message', '登録が完了しました。');
    }

    //プロジェクト編集情報取得
    public function edit($project_no){
        //編集対象プロジェクト情報取得
        $project = $this->project::select('project_no','project_name','genre','nendai','memo','color','series')->where('project_no', $project_no)->get();
        return view('project.edit-project', ['project' => $project]);
    }

    //プロジェクト更新
    public function update(Request $request,$project_no){
        //フォームからの入力値を取得
        $this->project = Project::find($project_no);
        $this->project->project_name = $request-> input('project_name');
        $this->project->genre = $request-> input('genre');
        $this->project->nendai = $request-> input('nendai');
        $this->project->memo = $request-> input('memo');
        $this->project->color = $request-> input('color');
        $this->project->series = $request-> input('series');
        $this->project->save();
        
        return redirect('/project-list')->with('message', '更新が完了しました。');
    }

    //プロジェクト削除(論理削除)
    public function delate($project_no){
        $project = $this->project::find($project_no);
        $project->del_flg = 1;
        $project->save();
        
        return redirect('/project-list')->with('message', '削除が完了しました。');
    }
}
