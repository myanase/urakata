<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    //プロジェクト一覧
    public function index(Request $request){
        // 現在ログインしているユーザーのID取得
        $user_id = Auth::id();

        $projects = new Project;
        //ログイン中ユーザーに紐づく未削除のプロジェクトを取得
        $projects = Project::select('project_no','project_name', 'color')->where('user_id', $user_id)->where('del_flg', '0')->get();
        return view('project.project-list', ['projects' => $projects]);
    }

    //プロジェクト登録
    public function store(Request $request){
        // 現在ログインしているユーザーのID取得
        $user_id = Auth::id();

        //フォームからの入力値を取得
        $project = new Project;
        $project->project_name = $request-> project_name;
        $project->user_id = $user_id;
        $project->genre = $request-> genre;
        $project->nendai = $request-> nendai;
        $project->memo = $request-> memo;
        $project->color = $request-> color;
        $project->series = $request-> series;
        $project->save();
        
        return redirect('/project-list')->with('message', '登録が完了しました。');
    }

    //プロジェクト編集情報取得
    public function edit($project_no){
        //編集対象プロジェクト情報取得
        $project = new Project;
        $project = Project::select('project_no','project_name','genre','nendai','memo','color','series')->where('project_no', $project_no)->get();
        return view('project.edit-project', ['project' => $project]);
    }

    //プロジェクト更新
    public function update(Request $request,$project_no){
        //フォームからの入力値を取得
        $project = new Project;
        $project = Project::find($project_no);
        $project->project_name = $request-> input('project_name');
        $project->genre = $request-> input('genre');
        $project->nendai = $request-> input('nendai');
        $project->memo = $request-> input('memo');
        $project->color = $request-> input('color');
        $project->series = $request-> input('series');
        $project->save();
        
        return redirect('/project-list')->with('message', '更新が完了しました。');
    }

    //プロジェクト削除(論理削除)
    public function delate($project_no){
        $project = new Project;
        $project = Project::find($project_no);
        $project->del_flg = 1;
        $project->save();
        
        return redirect('/project-list')->with('message', '削除が完了しました。');
    }
}
