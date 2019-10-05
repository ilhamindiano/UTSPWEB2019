@extends('layouts.app')

@section('css')
    <link href="/css/login.css" rel="stylesheet">
@endsection

@section('content')

<!-- Page Content -->
<section>
    <div class="card card-signin container bg-light">

        <!-- Page Heading -->

        <div style="width: 100%; display: table;">
                <div style="display: table-row">
                    <div class="container">
                        <div style="width: 1000px; display: table-cell;">
                            <h1 class="my-4 section-heading text-faded" style="font-weight:bold; color:#F05F40">{{$note->title}}</h1>
                        </div>
                        <div style="display: table-cell;">
                                <a href="/" class="btn btn-secondary">Back to Back</a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="container" style="width:100%">
                        <p class="my-5" style="color: #212529">{!!$note->body!!}</p>
                </div>
                <hr>
                <div class="container">
                    <div style="width: 1000px; display: table-cell;">
                        <small style="color:#212529">{{$note->created_at}}</small>
                    </div>
                    @if(!Auth::guest())
                        <div style="display:table-cell;padding:20px">
                                <a href="/notes/{{$note->id}}/edit" class="btn btn-primary">Edit</a>
                        </div>

                        <div style="display: table-cell;">
                            {!!Form::open(['action' => ['NotesController@destroy', $note->id],'method'=>'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </div>
                    @endif
                </div>
                
        </div>
        <br>
    </div>
</section>
@endsection