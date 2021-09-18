@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"> 
            <div class="card">
                <div class="card-header">タイトルの編集</div>

                <div class="card-body">
                    <div class="card-title">本のタイトル</div>

                    @include('common.errors')

                    <form action="{{url('books/update')}}" method="post" class="form-horizontal">
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label for="item_name">書籍名</label>
                                <input type="text" name="item_name" id="item_name" class="form-control" value="{{$book->item_name}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="publisher">出版社</label>
                                <input type="text" name="publisher" id="publisher" class="form-control" value="{{$book->publisher}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="auther_name">著者</label>
                                <input type="text" name="auther_name" id="auther_name" class="form-control" value="{{$book->auther_name}}">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="published">出版日</label>
                                <input type="datetime" name="published" id="published" class="form-control" value="{{$book->published}}">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="item_amount">価格</label>
                                <input type="text" name="item_amount" id="item_amount" class="form-control" value="{{$book->item_amount}}">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="item_number">数量</label>
                                <input type="text" name="item_number" id="item_number" class="form-control" value="{{$book->item_number}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="well well-sm">
                                <button type="submit" class="btn btn-primary">
                                    更新
                                </button>
                                <a class="btn btn-link pull-right" href="{{url('/')}}">戻る</a>
                            </div>

                            <input type="hidden" name="id" value="{{$book->id}}">
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
