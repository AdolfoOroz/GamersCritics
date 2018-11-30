<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
class ReviewController extends Controller
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
		+-------------+------------------+------+-----+---------+----------------+
| Field       | Type             | Null | Key | Default | Extra          |
+-------------+------------------+------+-----+---------+----------------+
| id          | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| title       | varchar(255)     | NO   |     | NULL    |                |
| description | varchar(4000)    | YES  |     | NULL    |                |
| created_at  | timestamp        | YES  |     | NULL    |                |
| updated_at  | timestamp        | YES  |     | NULL    |                |
| user_id     | int(11)          | NO   |     | NULL    |                |
| game_id     | int(11)          | NO   |     | NULL    |                |
| rating      | int(11)          | NO   |     | NULL    |                |		
	*/
    public function store(Request $request)
    {
		$ReviewTitle=$request->input('TitleReview');
		$ReviewGame=$request->input('GameID');
		$ReviewUser=$request->input('UserReview');
		$ReviewDescription=$request->input('GameReview');
		
		$NewReview=new Review;
		$NewReview->title=$ReviewTitle;
		$NewReview->description=$ReviewDescription;
		$NewReview->user_id=$ReviewUser;
		$NewReview->game_id=$ReviewGame;
		$NewReview->rating=0;
		$NewReview->save();
		

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
		 return view(
			'review', 
			['reviewchosen' => Review::select('users.name', 'reviews.title', 'reviews.created_at', 'reviews.id as idreview','reviews.description','games.name as gamename', 'games.overalreview as littlereview','games.publisher','games.director')->leftJoin('users','reviews.user_id','=','users.id')->leftJoin('games','reviews.game_id','=','games.id')->findOrFail($id)]
		);
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