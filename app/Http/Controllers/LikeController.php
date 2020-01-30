<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Like;

class LikeController extends Controller
{



    public function getLike($user_id) {
        $like = Like::where("user_id", $user_id)->get();
        return response()->json(["success" => true, "data" => $like]);
    }

    public function createLike($user_id,$name,$question_id) {

        $like = Like::where("user_id", $user_id)->where("question_id", $question_id)->get();
        if(count($like) > 0){
            return response()->json(["success" => false, "data" => "You had already liked this question"]);
        }

        $totalLikes = Like::where("user_id", $user_id)->get();

        if(count($totalLikes) > 4){
            return response()->json(["success" => false, "data" => "You can only like 5 questions."]);
        }

        $input              =       array(
            'user_id'          =>          $user_id,
            'question_id'        =>          $question_id,
            'name'           =>          $name
        );
        $like = Like::create($input);
        return response()->json(["success" => true, "data" => "Thanks for liking question."]);
    }

    public function deleteLike($user_id,$question_id) {

        Like::where("user_id", $user_id)->where("question_id", $question_id)->delete();
        return response()->json(["success" => true, "data" => "Question Unliked"]);
    }
}
