@extends('layouts.app')


@section('css')
    <link href="/css/login.css" rel="stylesheet">
@endsection

@section('content')

<!-- Page Content -->
<section>
    <div class="container">
        <div class="row">
            <div class=" col-sm-3 col-md-4 mx-auto">
                <div class="card card-signin my-5 bg-light">
                    <div class="card-body">
                        <h2 style="text-align:center; font-weight:bold; color:#212529">Profil</h2>
                        <hr>
                        <h6 style="text-align:center">{{ Auth::user()->name }}</h6>
                        <h6 style="font-weight:bold">Name :</h6>
                        <p style="text-align:justify">{{Auth::user()->name}}</p>
                        <h6 style="font-weight:bold">Email :</h6>
                        <p style="text-align:justify">{{Auth::user()->email}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-10 col-md-10 col-lg-10 mx-auto">
                <div class="card card-signin my-5 bg-light">
                    <div class="card-body">
                            <h1  style="text-align:center ;font-weight:bold; color:#212529">Notes</h1>
                                <hr>
                                <form action="/search" method="POST" role="search">
                                    {{ csrf_field() }}
                                    <div class="input-group" style="margin-bottom: 1em">
                                        <input type="text" class="form-control" name="keyword"placeholder="Search your note"> 
                                        <button type="submit" class="btn btn-default">Search</button>
                                    </div>
                                </form>
                                @if (count ($notes) > 0)
                                <div>
                                        <table style="width:100%">
                                            @foreach ($notes as $note)
                                            <tr>
                                                <td><h4 style="font-weight:bold"><a href="/X{{$note->url}}">{{$note->title}}</a></h4></td>
                                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal{{$note->id}}">Edit Title & Link</button></td>
                                                <div class="modal fade" id="Modal{{$note->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ChangeModalLabel">Edit Link</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form class="form" method="POST" action="{{action('NotesController@updateTitle')}}">
                                                        @csrf
                                                    <input type="hidden" name="id" value="{{$note->url}}">
                                                        <div class="modal-body">
                                                            <label for="title">Title</label>
                                                            <input id="title" type="text" class="form-control" name="title" value="{{$note->title }}" autofocus>
                                                            <label for="url">URL</label>
                                                            <input id="url" type="text" class="form-control" name="url" value="{{$note->url }}" autofocus>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                                </div>
                                                @php
                                                 if($note->locked)$lock='Unlock';
                                                 else $lock='Lock';
                                                @endphp
                                                <td> {!!Form::open(['action' => ['NotesController@lock'],'method'=>'POST', 'class' => 'pull-right'])!!}
                                                        {{Form::hidden('url',$note->url)}}
                                                        {{Form::submit($lock,['class'=>'btn btn-info'])}}
                                                    {!!Form::close()!!}</td>

                                            <td> {!!Form::open(['action' => ['NotesController@destroy', $note->url],'method'=>'POST', 'class' => 'pull-right'])!!}
                                                    {{Form::hidden('_method','DELETE')}}
                                                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                                {!!Form::close()!!}</td>
                                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ShareModal{{$note->url}}">Get Link</button></td>
                                                <div class="modal fade" id="ShareModal{{$note->url}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ChangeModalLabel">Share Link</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                <input class = "form-control"type="text" name="url" value="catmah.local/X{{$note->url}}" style="margin-bottom: 1em" readonly>
                                                    </div>
                                                </div>
                                                </div>
                                                
                                                <td><p>{{$note->created_at}}</p></td>
                                                <td><h6>{{$note->subject}}</h6></td>

                                            </tr>
                                            @endforeach
                                        </table>
                                </div>
                                {{-- {{$notes->links()}} --}}
                                @else
                                    <p class="mb-4 text-center">You have no Nope Note.. :(</p>
                                @endif
                                <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection