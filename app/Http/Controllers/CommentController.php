<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Comment;
   
class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
            'body' => 'required',
        ]);
   
        $input = $request->all();
        $input['user_id'] = $request['user_id'];

        if (!isset($request['user_id']))
        {
            $input['user_id']=NULL;
        }
    
        Comment::create($input);
   
        return back();
    }
}