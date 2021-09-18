@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"> 
            <div class="card">
                <div class="card-body">
                    <div class="card-title">本のタイトル</div>

                    @include('common.errors')

                    <form action="{{url('books')}}" method="post" class="form-horizontal">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-8">
                                <label for="item_name">書籍名</label>
                                <input type="text" name="item_name" id="item_name" class="form-control" value="{{old('item_name')}}">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="publisher">出版社</label>
                                <input type="text" name="publisher" id="publisher" class="form-control" value="{{old('publisher')}}">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="auther_name">著者</label>
                                <input type="text" name="auther_name" id="auther_name" class="form-control" value="{{old('auther_name')}}">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="published">出版日</label>
                                <input type="date" name="published" id="published" class="form-control" value="{{old('published')}}">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="item_amount">価格</label>
                                <input type="text" name="item_amount" id="item_amount" class="form-control" value="{{old('item_amount')}}">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="item_number">数量</label>
                                <input type="text" name="item_number" id="item_number" class="form-control" value="{{old('item_number' ,'1')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                @if (count($books) > 0)
                    <div class="card-body">
                        <div class="card-title">本の一覧</div>
                            <table class="table table-striped task-table">
                                <thead>
                                    <th>書名</th>
                                    <th>出版社</th>
                                    <th>著者</th>
                                    <th>出版日</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                        <tr>
                                            <td class="table-text col-sm-4">
                                                <div>{{ $book->item_name }}</div>
                                            </td>
                                            <td class="table-text col-sm-2">
                                                <div>{{ $book->publisher }}</div>
                                            </td>
                                            <td class="table-text col-sm-2">
                                                <div>{{ $book->auther_name }}</div>
                                            </td>
                                            <td class="table-text  col-sm-2">
                                                <div>{{ $book->published->format('Y/m') }}</div>
                                            </td>
                                            <td class="col-sm-1">
                                                <form action="{{url('book/' . $book->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">
                                                        削除
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="col-sm-1">
                                                <form action="{{url('booksedit/' . $book->id)}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning">
                                                        変更
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            {{$books->links()}}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
