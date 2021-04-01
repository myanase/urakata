<x-app-layout>
    <x-slot name="header">
        <h1>登場人物登録・編集</h1>
    </x-slot>
    @section('contents')

    <!-- グループ追加 -->
    <form autocomplete=off>
    @csrf
        <h1>グループ</h1>
        <p>※各画面でのキャラクターの表示順に影響します。</p>
        <label>
            <input class="js-check" type="radio" name="rs" value="1" onclick="formSwitch()" >苗字ごとで表示
        </label>
        <label>
            <input class="js-check" type="radio" name="rs" value="1" onclick="formSwitch()">個人設定する
        </label>
            グループ名：<input type="text" name="othertext" value="" size="10">
    <form>
    <!-- 入力フォーム -->
    <form action = "/update-character" method = "post">
        <table>
            @csrf
            <tr>
                <th>名前</th>
                <th>作品開始時年齢</th>
                <th>グループ</th>
                <th>出身</th>
                <th>実父</th>
                <th>実母</th>
                <th>兄妹順</th>
                <th>主人公との関係</th>
            </tr>
            <tr>
                <td>
                    <input type="text" size="10px" name="char_name" required>
                </td>
                <td>
                    <input type="text" size="10px" name="start_age" required>
                </td>
                <td>
                    <input type="text" size="10px" name="group">
                </td>
                <td>
                    <input type="text" size="10px" name="birthplace">
                </td>
                <td>
                    <input type="text" size="10px" name="father">
                </td>
                <td>
                    <input type="text" size="10px" name="mather">
                </td>
                <td>
                    <input type="text" size="10px" name="brother">
                </td>
                <td>
                    <input type="text" size="10px" name="relation">
                </td>
            </tr>
        </table>
    </form>
</x-app-layout>