@extends('layouts.default')

@section('title', $app->name)

@section('content')
    
    <div class="row app-container mg-top">

        <div class="col s12 box-content white">
            <div class="row info-row">
                <div class="col s12 m3 l4 info-img">
                    <img src="/{{ $app->icon }}" alt="{{ $app->name }}">
                </div>
                <div class="col s12 m9 l8">
                    <h4>{{ $app->name }}</h4> 
                    <p>Developed By {{ $app->getDeveloper() }}</p>

                    <div class="info-dl">
                        @if ( $app->store_url)
                        <a href="{{ $app->store_url }}" 
                            target="_blank"
                            class="waves-effect waves-light btn indigo darken-2">
                            <i class="material-icons left">file_download</i>Download From Store
                        </a>
                        @endif

                        @if ( $app->website_url)
                        <a href="{{ $app->website_url }}" 
                            target="_blank"
                            class="waves-effect waves-light btn indigo darken-2">
                            Visit To Website
                        </a>
                        @endif

                        @if ( $app->direct_url)
                        <a href="{{ $app->direct_url }}" 
                            target="_blank"
                            class="waves-effect waves-light btn-flat">
                            Direct Download
                        </a>
                        @endif
                    </div>

                    <div class="info-desc">
                        <h5>Description</h5>

                        <p>{{ $app->description }}</p>
                    </div>

                    <div class="info-slider">
                        <ul class="screenshots">
                            @foreach($app->screenshots as $screenshot)
                                <li>
                                    <img src="/{{ $screenshot }}">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                        
                </div>
            </div>

        </div> <!-- end of col s12 box-content white -->

    </div>
@endsection