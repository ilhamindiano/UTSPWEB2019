@extends('layouts.app')

@section('css')
    <link href="/css/login.css" rel="stylesheet">
@endsection

@section('content')

<!-- Page Content -->
<section>
<div class="container">
    <div class="row">
        <div class="col-sm-15 col-md-10 col-lg-7 mx-auto">
                <div class="container card card-signin bg-light">

                        <!-- Page Heading -->
                        <div style="display: table;">
                                <div style="display: table-row">
                                    <div style="width: 1000px; display: table-cell;">
                                        <div class="container">
                                            <h1 class="my-5 section-heading text-faded" style="font-weight:bold; color:#F05F40">Note</h1>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <hr>
                
                        {!! Form::open(['action' => 'NotesController@store','method'=>'POST']) !!}
                            <div class="form-group">
                                {{Form::label('title','Title')}}
                                {{Form::text('title','',['class' => 'form-control','placeholder' => 'Title'])}}
                            </div>
                            <div class="form-group">
                                    <label for="url">URL</label>
                                    <input type="text" class="form-control" name="url">
                            </div>
                            <div style="display:table-cell">
                                <div style="display:table-cell">
                                    
                                </div>

                            </div>
                            <div style="display: table-cell; " class="my-2 text-right">
                            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
                            {!! Form::close() !!}
                            <a href="/home" class="btn btn-secondary" style="   ">Return</a>
                            </div>
                        <br/>
                    </div>

        </div>
    </div>
</div>
   
</section>
@endsection