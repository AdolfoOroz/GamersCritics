<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Games;
class GamesControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	 
	 /*
		| id           | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
		| name         | varchar(255)     | NO   |     | NULL    |                |
		| publisher    | varchar(255)     | NO   |     | NULL    |                |
		| director     | varchar(255)     | NO   |     | NULL    |                |
		| overalreview | varchar(255)     | NO   |     | NULL    |                |
		| category_id  | int(11)          | NO   |     | NULL    |                |
		| created_at   | timestamp        | YES  |     | NULL    |                |
		| updated_at   | timestamp        | YES  |     | NULL    |
		
	*/
    public function store(Request $request)
    {
		$GameName=$request->input('GameName');
		$Publisher=$request->input('GameDeveloper');
		$Director=$request->input('GameDirector');
		$Summary=$request->input('GameSinopsis');
		$Category=$request->input('GameCategory');
		
		$NewGame=new Games;
		$NewGame->name=$GameName;
		$NewGame->publisher=$Publisher;
		$NewGame->director=$Director;
		$NewGame->overalreview=$Summary;
		$NewGame->category_id=$Category;
		$NewGame->save();
		

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
