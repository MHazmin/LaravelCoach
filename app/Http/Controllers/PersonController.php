<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PersonController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
//	public function index()
//	{
//            echo 'default index';
//	}
        
        public function getIndex() {
           // echo 'default function';
            
            $salary = 2000;
            //array 1
            $arr = [
                'x' =>1,
                'y' =>2
                
            ];
            //array
            $data = [
                'org'=>'Opensoft',
                'post'=>'Programmer',
            ];
            
            return view('person.list',  compact('salary','arr'))
                    ->with('name1','Hazmin Rahman')
                    ->with('address','London')
                    ->withAge('30')
                    ->with($data)
                ;
        }
        
        public function getAddress($negeri) {
            echo 'this is my address '.$negeri;
        }
        
        public function getLooping() {
            $arr = [1,2,3,4];
            $arr2 = [];
            
            return view('person.looping',  compact('arr','arr2'));
        }
        
        
        
        
        
        
        
        

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
	}

}
