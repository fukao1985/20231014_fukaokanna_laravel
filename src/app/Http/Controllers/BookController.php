<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // 本に関するデータを一覧表示する
    public function index(){
        $items = Book::all();
        return view('book.index', ['items'=>$items]);
    }

    // 新規投稿フォーム用のページに遷移する
    public function add(){
        return view('book.add');
    }

    // 入力された値をBooksテーブルに追加する
    public function create(Request $request){
        $this->Validate($request, Book::$rules);
        $form = $request->all();
        Book::create($form);
        return redirect('/book');
    }
}
