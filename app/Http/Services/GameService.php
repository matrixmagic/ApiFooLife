<?php

namespace App\Http\Services;
use App\Game;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;
class GameService {


public function add($data,$services){

$validator =Validator::make($data,[
'name'=>'required','string',   
]);
if($validator->fails())
throw new CustomException($validator->messages()->first());

$game =new Game($data);
$game->save();
$game=Game::find($game->id);
return $game;
}

public function get($id){
    $game=Game::find($id);
    if($game ==null)
    throw new CustomException("game not found");
    return $game;
    }

    public function getAll(){
        $games=Game::all();
        if(count($games) ==0)
        throw new CustomException("no games found");
        return $games;
    }
    public function getAllList(){
        $games=Game::all();
        
        if(count($games) ==0)
        throw new CustomException("no games found");
        $games->each(function ($item, $key) {
            $item->value=$item->id;
            $item->display=$item->name;
        });
        return $games;
    }
}
