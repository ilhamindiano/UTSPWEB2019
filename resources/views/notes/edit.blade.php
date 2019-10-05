@extends('layouts.app')

@section('css')
    <link href="/css/login.css" rel="stylesheet">
@endsection

@section('content')

<!-- Page Content -->
<section>
    <div id='data' data-id={{$note->url}}></div>
<div class="container">
        <div class="row">
            <div class="col-sm-15 col-md-10 col-lg-15 mx-auto">
                    <div class="container card card-signin bg-light">
                        
                            <!-- Page Heading -->
                            <div style="display: table;">
                                    <div style="display: table-row">
                                        <div style="width: 1000px; display: table-cell;">
                                            <div class="container">
                                                <h1 class="my-5 section-heading text-faded" style="font-weight:bold; color:#F05F40">{{$note->title}}</h1>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <hr>

                            <form class="form" method="POST" action="">
                                @csrf
                            <label for="textbox">Note</label>
                            <textarea class="form-control" cols="50" rows="10" id="textbox" style="margin-bottom: 5em">{{$note->body}}</textarea>
                                </div>
                                </div>
                            </form>
        
            
        <br/>
    </div>
</section>
@endsection

@section("scripts")
<script src="{{asset('js/live.js')}}"></script>
@endsection