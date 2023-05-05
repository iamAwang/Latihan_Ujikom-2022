<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function index(){
        $films=Film::simplepaginate(5);
        return view('film',compact(['films']));
    }

    public function create(){
        return view('form_film');
    }

    public function store(Request $request){
        $file = $request->file('poster');
        $name = $file->hashName();
        $file->store('photos','public');

        Film::create([
            'title'=>$request->title,
            'poster'=>$name,
            'duration'=>$request->duration,
            'price'=>$request->price,
            'time'=>$request->time
        ]);
        return redirect('film');
    }

    public function edit($id){
        $edit=Film::find($id);
        return view('form_film',compact(['edit']));
    }

    public function update(Request $request,$id){
        $film=Film::find($id);

        $film->title=$request->title;
        $film->duration=$request->duration;
        $film->price=$request->price;
        $film->time=$request->time;
        $film->save();
        
        return redirect('film');
    }

    public function delete($id){
        $film=Film::find($id);

        $film->delete();

        return redirect('film');
    }
}
