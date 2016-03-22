<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Priv;

class BookController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex() {
        Priv::isPriv('BV');
        return Book::all();
                
    }

    public function getList() {
        //$books = Book::all();
        $books = Book::paginate(2);
//        foreach ($books as $book){
//
//            echo "{$book->title}....{$book->created_at} <br>";
//        }

        return view('books.list', compact('books'));
    }

    public function getSearchform() {

        return view('books.form');
    }

    public function postSearchResult() {
        return $this->search();
    }

    public function getSearchResult() {
        return $this->search();
    }

    private function search() {
        if (isset($_GET['page'])) {
            //$books = Book::paginate(2);
            $title = $_GET['title'];
            $books = Book::where('title', 'like', "%$title%")->paginate(1);
            //clik pd pagination
        } else {
            //click search button
            $title = $_POST['title'];
            $books = Book::where('title', 'like', "%$title%")->paginate(1);
        }

        return view('books.result', compact('books'));
    }

    public function getCari() {
        //return view('books.cari');
        return view('books.cari2');
    }
    public function getData() {
        $tot = isset($_GET['rows'])? $_GET['rows'] : 10;
        $title = isset($_GET['title'])? $_GET['title'] : '';
        $author = isset($_GET['author'])? $_GET['author'] : '';
        $pg = Book::where('title','like',"%$title%")
                ->where('author','like',"%$author%")
                ->paginate($tot);
        //$books = Book::all();
        $arr = $pg->toArray();
        $result = [];
      //  $result['total'] = count($books);
       // $pg = Book::paginate(10);
        $result['rows'] = $arr['data'];
        $result['total'] = $pg->total(); //$arr['total']
        return $result;
    }
    
    public function getModal() {
        return view('books.modal');
    }
    
    public function postUpdate() {
        $id= $_POST['id'];
        $book = Book::find($id);
        $book->title = $_POST['title2'];
        $book->author = $_POST['author2'];
        $book->pg_count = $_POST['page2'];
        $book->save();
        echo 'ok';
    }

    public function getSave() {
        $book = new Book;
        $book->title = 'ABC';
        $book->pg_count = 101;
        $book->purchase_at = '09/03/2016';
        $book->save();
    }

    public function getDetails($id) {
        $book = Book::find($id);
        return $book;
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
