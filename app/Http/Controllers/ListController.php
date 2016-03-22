<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ListController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
                echo 'index';
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
        
        //get ../lists/create
	public function create()
	{
		//
                echo 'create';
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
        //post
	public function store()
	{
		//
                echo 'store';
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
        
        //get ../lists/123
	public function show($id)
	{
		//
                 return view('lists.form');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
        
        //get ../lists/123/edit
	public function edit($id)
	{
		//
                echo 'edit';
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
                echo 'update';
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
                echo 'destroy';
	}

}
