<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Question;
use App\Like;

class QuestionController extends Controller
{
    public function createGetQuestion($user_id, $name ,$content) {


        // validate input
        // $validator  =   Validator::make($request->all(),
        //     [
        //         'content'              =>      'required',
        //     ]
        // );
 
        // // if validation fails
        // if($validator->fails()) {
        //     return response()->json(["success" => false, "data" => "Please enter a valid question."]);
        // }

        //Checking if user had already asked more than 3 questions//
        $questions          =       Question::where("owner_id", $user_id)->get();

        if(sizeof($questions) > 2){
            return response()->json(["success" => false, "data" => "You cant post more than 3 questions"]);
        }


 
        // creating array of inputs
        $input              =       array(
            'content'          =>          $content,
            'owner_id'        =>          $user_id,
            'name'           =>          $name
        );

        // save into database
        $question                   =       Question::create($input);
 
        return response()->json(["success" => true, "data" => $question]);
    }
 
 
    public function questionListing($user_id) {
 
        // Listing post through user id
        $questions = Question::all();
        $likes = Like::where("user_id", $user_id)->get();

        $likeArr = array();
        foreach($likes as $like){
            array_push($likeArr , $like->question_id);
        }
        return response()->json(["success" => true, "data" => $questions, "like" => $likeArr]);
    }

}
