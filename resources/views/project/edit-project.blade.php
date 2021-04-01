<x-app-layout>
    <x-slot name="header">
        <h1>プロジェクト編集</h1>
    </x-slot>
    @section('contents')

    <!-- エラーメッセージ表示 -->
    @if(count($errors)>0)
    <div>
        <url>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- 入力フォーム -->
    <form method = "post">
    <table>
        @csrf
        <tr>
            <th>作品名</th>
            <td>
                <input type="text" name="project_name" value="{{ $project[0]->project_name }}" required>
            </td>
        </tr>
        <tr>
            <th>ジャンル</th>
            <td>
                <select name="genre" id="genre">
                    @for ($i = 0; $i < 12; $i++)
                    <?php $genre_name = 'const.'.$i; ?>
                        @if($i == $project[0]->genre)
                        <option value="{{ $i }}" selected>{{config($genre_name)}}</option>
                        @else
                        <option value="{{ $i }}">{{config($genre_name)}}</option>
                        @endif
                    @endfor
                </select>
            </td>
        </tr>
        <tr>
            <th>時代</th>
            <td>
                <input type="text" name="nendai" value="{{ $project[0]->nendai}}">
            </td>
        </tr>
        <tr>
            <th>備考</th>
            <td>
                <input type="text" name="memo" value="{{ $project[0]->memo}}">
            </td>
        </tr>
        <tr>
            <th>プロジェクトカラー</th>
            <td>
                <input type="color" name="color" value="{{ $project[0]->color}}">
            </td>
        </tr>
        <tr>
            <th>シリーズ</th>
            <td>
                <input type="text" name="series" value="{{ $project[0]->series}}">
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <a href="{{ route('project-list') }}">戻る</a>
                <input type="submit" value="プレビュー" formaction="/preview">
                <input type="submit" value="更新" formaction="/update-project/{{ $project[0]->project_no }}">
            </td>
        </tr>
    </table>
    </form>
</x-app-layout>