<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Illuminate\Support\Facades\Input;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::orderBy('created_at','desc')->paginate(10);
        return view('notes.index')->with('notes',$notes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required'
        ]);
        $onote=Note::find($request->input('url'));
        if($onote) return redirect('notes/create')->with('error','URL telah dipakai');
        //Create Notes
        $note = new Note;
        $note->title = $request->input('title');
        $note->url = $request->input('url');
        $note->locked = false;
        $note->user_id = auth()->user()->id;
        $note->save();

        return redirect('/home')->with('success','Catatan telah dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        return view('notes.show')->with('note',$note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($url)
    {
        $note = Note::find($url);
        if($note) 
        {
            if($note->locked==false)
            return view('notes.edit')->with('note',$note);
            else{
                if(Auth()->id()==$note->user_id){
                    return view('notes.edit')->with('note',$note);
                }
                else{
                    return redirect('/home')->with('error','Note Dikunci');
                }
            }
        }
        else return redirect('/home')->with('error','Note tidak ada');
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
        $this->validate($request, [
            'title' => 'required',
            'subject' => 'required',
            'body' => 'required'
        ]);

        //Create Notes
        $note = Note::find($id);
        $note->title = $request->input('title');
        $note->subject = $request->input('subject');
        $note->body = $request->input('body');
        $note->save();

        return redirect('/home')->with('success','Catatan telah diupdate!');
    }

    public function updateTitle(Request $request){
        $this->validate($request, [
            'title' => 'required'
        ]);
        $onote=Note::find(Input::get('url'));
        $onote->title = Input::get('title');
        $onote->save();
        if($onote) return redirect('/home')->with('error','URL telah dipakai');

        $note = Note::find(Input::get('id'));

        
        $note->url=Input::get('url');
        $note->save();

        return redirect('/home')->with('success','Link telah di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($url)
    {
        $note = Note::find($url);
        $note->delete();
        return redirect('/home')->with('success','Note telah dihapus');
    }

    public function get(){        
        $note = Note::find(Input::get('url'));
        return $note->body;
    }

    public function updateBody(){
        $note = Note::find(Input::get('url'));
        $note->body = Input::get('body');
        $note->save();
        return $note->body;
    }

    public function lock()
    {
        $note = Note::find(Input::get('url'));
        if($note)
        {
            if($note->locked==true) 
            {
                $note->locked=false;
                $note->save();
                return redirect('/home')->with('success','Note telah diunlock');
            }
            else 
            {
                $note->locked=true;
                $note->save();
                return redirect('/home')->with('success','Note telah dilock');
            }
        }
        else
        return redirect('/home')->with('error','Note tidak ada');
        
    }

    public function search(){
        $keyword=Input::get('keyword');
        $notes = Note::when($keyword, function ($query) use ($keyword) {
            $query->where('title', 'like', "%{$keyword}%")
                ->orWhere('body', 'like', "%{$keyword}%");
        })->where('user_id',Auth()->id())->orderBy('created_at','desc')->paginate(10);
        return view('notes.index')->with('notes',$notes);
    }
    
}
