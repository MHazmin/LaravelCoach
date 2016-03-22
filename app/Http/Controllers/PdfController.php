<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\App; 

class PdfController extends Controller {
    
    //always
    public function __construct() {
//        $this->middleware('auth');
//        $this->middleware('super');// boleh access sume function
//        $this->middleware('admin');// boleh access sume function
        
//        $this->middleware('super',['except'=>['getSample2']]);
//        $this->middleware('admin',['except'=>['getSample']]);
//        $this->middleware('super',['only'=>['getSample2']]);
//        $this->middleware('admin',['only'=>['getSample']]);
    }

    public function getSample() {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }

    public function getSample2() {
        $books = Book::all();
        $data = ['books'=>$books];
        $pdf = \PDF::loadView('pdf.invoice', $data);
//        return $pdf->stream('invoice.pdf');
        //return $pdf->download('invoice.pdf');
        return $pdf->save(base_path().'/doc/invoice2.pdf')
                ->stream();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
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
