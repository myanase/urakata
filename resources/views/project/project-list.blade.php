<x-app-layout>
    <x-slot name="header">
    <h1>プロジェクト一覧</h1>
        <a href="{{ route('create-project') }}"><input type="button" value="登録"></a>
    </x-slot>
    @section('contents')
    <!-- if(window.confirm('削除してよいですか？')){
                location.href = "/delate-project";
            }
        -->

        @if(session('message'))
            <p>{{ session('message') }}</p>
        @endif
    
        @if(isset($projects))
            @foreach($projects as $project)
            <div class = "boxProject">
                <p>{{ $project->project_name }}</p>
                <a href="/edit-project/{{ $project->project_no }}">編集</a>
                <a href="/delate-project/{{ $project->project_no }}">削除</a>
                <!--<a href="/charcter-edit/{{ $project->project_no }}">登場人物一覧</a>
                <a href="#">相関図</a>
                <a href="#">出来事・年齢早見表</a>-->
                <!--　とりあえず削除機能を搭載したいので
                    TODO:JS実装
                     <a href="#" onClick="delate(); return false;">削除</a> -->
            </div>
            <p>===================</p>
            @endforeach
        @else
            <p>'まだプロジェクトは登録されていません。'</p>
        @endif
</x-app-layout>