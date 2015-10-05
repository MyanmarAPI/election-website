@extends('layouts.default')

@section('title', $app->name)

@section('header_meta')
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $app->name }} Application" />
<meta property="og:url" content="{{ URL::current() }}" />
<meta property="og:site_name" content="MaePaySoh"/>
<meta property="og:description" content="{{ $app->description }}" />
<meta property="og:image" content="{{ url($app->icon) }}" />
@endsection

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
                    <p>{{ ucfirst($app->type) }} Application</p>

                    <div class="info-dl">
                        @if ( $app->direct_url)
                        <p>
                            <a href="{{ $app->direct_url }}" 
                                target="_blank"
                                class="waves-effect waves-light btn indigo darken-2 mm3">
                                <i class="material-icons left">file_download</i>ရယူရန်
                            </a>
                        </p>
                        @endif

                        @if ( $app->store_url)
                        <p>
                            <a href="{{ $app->store_url }}" 
                                target="_blank"
                                class="waves-effect waves-light btn indigo darken-2 mm3">
                                <i class="material-icons left">cloud_download</i>ရယူရန်
                            </a>
                        </p>
                        @endif

                        @if ( $app->website_url)
                        <p>
                            <a href="{{ $app->website_url }}" 
                                target="_blank"
                                class="waves-effect waves-light btn indigo darken-2 mm3">
                                <i class="material-icons left">web</i>ဝက်ဘ်ဆိုဒ်
                            </a>
                        </p>
                        @endif
                    </div>

                    <div class="info-desc">
                        <h5>Description</h5>

                        <p>{{ $app->description }}</p>
                    </div>

                    <div class="info-slider">
                        @if ( ! empty($app->screenshots))
                            <ul class="screenshots">
                                @foreach($app->screenshots as $screenshot)
                                    <li>
                                        <img src="/{{ $screenshot }}" class="materialboxed">
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                        
                </div>
            </div>

        </div> <!-- end of col s12 box-content white -->

    </div>
@endsection

@section('scripts')
    $('.materialboxed').materialbox();
@endsection