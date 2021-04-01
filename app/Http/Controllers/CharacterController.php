<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Char_inf;
use App\Models\Char_derail;
use App\Models\Character;

class CharacterController extends Controller
{
    //登場人物登録・編集画面（削除含む）
    public function edit($project_no){
        $char = new Char_inf;
        $char = Char_inf::select('group_name','last_name','middle_name','first_name')->where('project_no', $project_no)->get();
        return view('project.character-edit', ['char' => $char]);
    }

    //プロジェクト更新
    public function update(Request $request,$project_no){
        //フォームからの入力値を取得
        $cinf = new Char_inf;
        $cinf->project_no = $project_no;
        $cinf->group_name = $request-> input('group_name');
        $cinf->last_name = $request-> input('last_name');
        $cinf->middle_name = $request-> input('middle_name');
        $cinf->first_name = $request-> input('first_name');
        $cinf->save();
        
        $char_id = Char_inf::select('char_id')->where('project_no', $project_no)->get();

        $cd = new char_detail;
        $cd->project_no = $project_no;
        $cd->group_name = $request-> input('group_name');
        $cd->last_name = $request-> input('last_name');
        $cd->middle_name = $request-> input('middle_name');
        $cd->first_name = $request-> input('first_name');
        $cd->save();

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
