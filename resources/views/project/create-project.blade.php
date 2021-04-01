<x-app-layout>
    <x-slot name="header">
        <h1>プロジェクト登録</h1>
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
                <input type="text" name="project_name" required>
            </td>
        </tr>
        <tr>
            <th>ジャンル</th>
            <td>
                <select name="genre">
                    @for ($i = 0; $i < 12; $i++)
                    <?php $genre_name = 'const.'.$i; ?>
                    <option value="{{ $i }}">{{config($genre_name)}}</option>
                    @endfor
                </select>
            </td>
        </tr>
        <tr>
            <th>時代</th>
            <td>
                <input type="text" name="nendai">
            </td>
        </tr>
        <tr>
            <th>備考</th>
            <td>
                <input type="text" name="memo">
            </td>
        </tr>
        <tr>
            <th>プロジェクトカラー</th>
            <td>
                <input type="color" name="color">
            </td>
        </tr>
        <tr>
            <th>シリーズ</th>
            <td>
                <input type="text" name="series">
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input type="submit" value="プレビュー" formaction="/preview">
                <input type="submit" value="登録" formaction="{{ route('store-project')}}">
            </td>
        </tr>
    </table>
    </form>
</x-app-layout>