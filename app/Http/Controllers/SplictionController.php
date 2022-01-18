<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SplictionController extends Controller
{
    public function __construct(){
        $this->share['typesOfWords'] = \Config::get('splictionary.define.typesOfWords');
    }
    public function list(Request $request){
        $this->share['splictions'] = $splictions =  \App\Splictions::where('status', -1)->orderBy("created_at", "desc")->paginate(100);
        if(count($splictions) > 0){
            foreach($splictions as $spliction){
                $definitions[$spliction->id] = \App\Definitions::where('spliction_id', $spliction->id)->first();
            }
            $this->share['definitions'] = $definitions;
        }
        \View::share($this->share);
        return view('splictionary.listing');
    }
    public function vote(Request $request){
        $vote = new \App\Votes();
        $vote->ip = \Request::ip();
        $vote->session_id = $request->session_token;
        $vote->vote = $request->vote;
        $vote->spliction_id = $request->spliction_id;
        $vote->definition_id = $request->definition_id;
        $vote->hash = \Hash::make(\Request::ip().$request->session_token.$request->vote.$request->spliction_id);
        $vote->save();
        return \Response::json(['Success']);
    }
    public function view(Request $request){
        $this->share['spliction'] = \App\Splictions::where('word_splice', $request->spliction)->first();
        $this->share['definition'] = \App\Definitions::where('spliction_id', $spliction->id)->first();
        if(!$spliction)
            abort(404);
        \View::share($this->share);
        return view('splictionary.spliction');
    }
    public function home(Request $request){
        $this->list($request);
        return view('splictionary.splice-submission-form');
    }
    public function define(Request $request){

        $this->share['spliction'] = \App\Splictions::where('word_splice',$request->spliction)->first();
        \View::share($this->share);
        return view('splictionary.define');
    }
    public function defineSubmission(Request $request){
        $validation = $request->validate([
            "type_of_word" => "string|required",
            "definition" => "string|required",
        ]);
            $definition = new \App\Definitions;
            $this->share['spliction'] = $spliction = \App\Splictions::where('word_splice',$request->spliction)->first();
            $definition->definition = $request->definition;
            $definition->spliction_id = $spliction->id;
            $definition->type_of_word = $request->type_of_word;
            $definition->status = -1;
            $definition->save();
            return redirect()->route('spliction.entry',['spliction'=>$request->spliction]);
    }

    public function entry(Request $request){
        $this->share['spliction'] = $spliction = \App\Splictions::where('word_splice',$request->spliction)->first();
        if(is_null($spliction))
            abort(404);
        $this->share['wordAPI']['first_word'] = $fword = \App\WordsAPI::of($spliction->first_word);
        $this->share['wordAPI']['second_word'] = $sword = \App\WordsAPI::of($spliction->second_word);
        $definitions = \App\Definitions::where('spliction_id', $spliction->id)->orderBy('votes_up','DESC')->paginate(5);
        if(count($definitions) > 0){
            foreach ( $definitions as $definition ){
                $definitionVotes[$definition->id]['votesUp'] = $definition->votesUp = \App\Votes::where('spliction_id', $spliction->id)
                ->where('definition_id',$definition->id)
                ->where('vote',1)
                ->count();
                $definitionVotes[$definition->id]['votesDown'] = $definition->votesDown = \App\Votes::where('spliction_id', $spliction->id)
                ->where('definition_id',$definition->id)
                ->where('vote',0)
                ->count();
            }
            $this->share['definitionVotes'] = $definitionVotes;
        }
        $this->share['title'] = "Splictionary | ".$spliction->word_splice;
        $this->share['definitions'] = $definitions;
        \View::share($this->share);
        return view('splictionary.entry');
    }
    public function create(Request $request){
    	$spliction = new \App\Splictions;
        $validation = $request->validate(
            [
                "first_word" =>"string|required",
                "second_word" => "string|required",
                "word_splice" => "string|required|unique:\App\Splictions"
            ]);
    	$spliction->first_word  = $request->first_word;
    	$spliction->second_word = $request->second_word;
    	$spliction->word_splice = $request->word_splice;
        $spliction->status = -1;
    	if(!$spliction->where('word_splice', $request->word_splice)->exists()){
    		$spliction->save();
            $return = ['status'=>"success"];
        }else{
    	   $return = ['return_url'=>\URL::previous(),'status'=>"error", "message"=>$request->word_splice." already exists"];
    	}
        $this->list($request);
        return view('splictionary.splice-submission-form');
    }
}
