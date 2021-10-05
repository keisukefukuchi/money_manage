@extends('layouts.index')
@section('content')
    <header>
        <h1 class="header_title">シンプル家計簿</h1>
    </header>
    <div class="container">
        <div class="wrapper">
            <div class="register">
                <form action="/manage/create" method="post" class="flex between mb-30">
                    @csrf
                    <div id="regist_spending">
                        <table id="regist_data_tb">
                            <tr>
                                <td>登録日付</td>
                                <td><input type="date" id="regist_date" name="buy_date"></td>
                            </tr>
                            <tr>
                                @if ($errors->has('buy_date'))
                                    <td class="bottom error">{{ $errors->first('buy_date') }}</td>
                                @endif
                            </tr>
                            <tr>
                                <td>登録内容</td>
                                <td><input type="text" id="regist_contents" name="content"></td>
                            </tr>
                            <br>
                            <tr>
                                @if ($errors->has('content'))
                                    <td class="bottom error">{{ $errors->first('content') }}</td>
                                @endif
                            </tr>
                            <tr>
                                <td>金額</td>
                                <td><input type="number" id="regist_price" name="price"></td>
                            </tr>
                            <tr>
                                @if ($errors->has('price'))
                                    <td class="bottom error">{{ $errors->first('price') }}</td>
                                @endif
                            </tr>
                            <tr>
                                <td colspan="2"><button id="regist_spending_btn">登録</button></td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
            <form class="search" action="post">
                <input type="date" id="start_date">〜<input type="date" id="last_date">
                <button　id="display_btn">指定期間表示</button>
            </form>
        </div>
        <div class="border"></div>
        <main>
            <table>
                <tr>
                    <th>購入日</th>
                    <th>データ登録</th>
                    <th>金額</th>
                    <th>更新</th>
                    <th>削除</th>
                </tr>
                @foreach ($items as $item)
                    <tr>
                        <form action="{{ route('manage.update', ['id' => $item->id]) }}" method="post">
                            @csrf
                            <td>
                                <input type="date" class="input-update" value="{{ $item->buy_date }}" name="buy_date" />
                            </td>
                            <td>
                                <input type="text" class="input-update" value="{{ $item->content }}" name="content" />
                            </td>
                            <td>
                                <input type="number" class="input-update" value="{{ $item->price }}" name="price" />
                            </td>
                            <td>
                                <button class="button-update">更新</button>
                            </td>
                        </form>
                        <td>
                            <form action="{{ route('manage.delete', ['id' => $item->id]) }}" method="post">
                                @csrf
                                <button class="button-delete">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </main>

    </div>
@endsection
