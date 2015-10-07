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
                    <p>Application Type : {{ $app->getTypeString() }}</p>
                    <p>Developed By {{ $app->getDeveloper() }}</p>

                    <div class="info-dl">
                        

                        <p class="app-download">
                            @if ( $app->includeType('android') && $app->store_url)
                                <a href="{{ $app->store_url }}">
                                  <img alt="Get it on Google Play"
                                       src="https://developer.android.com/images/brand/en_generic_rgb_wo_45.png" />
                                </a>
                            @endif

                            @if ( $app->includeType('ios') && $app->apple_url)
                                <a href="{{ $app->apple_url }}" style="display:inline-block;overflow:hidden;background:url(http://linkmaker.itunes.apple.com/images/badges/en-us/badge_appstore-lrg.svg) no-repeat;width:165px;height:40px;"></a>
                            @endif
                        </p>

                        <p>
                            @if ( $app->direct_url)
                                <a href="{{ $app->direct_url }}" 
                                    target="_blank"
                                    class="waves-effect waves-light btn indigo darken-2 mm3">
                                    <i class="material-icons left">file_download</i>ရယူရန်
                                </a>
                            @endif
                             @if ( $app->website_url)
                                <a href="{{ $app->website_url }}" 
                                    target="_blank"
                                    class="waves-effect waves-light btn indigo darken-2 mm3">
                                    <i class="material-icons left">web</i>ဝက်ဘ်ဆိုဒ်
                                </a>
                            @endif
                        </p>
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