@extends('layouts.default')

@section('title', 'Application ' . $application->name)

@section('content')
    
    @if (Auth::user()->isAdmin())
        @include('partials.admin-toolbar')
    @else
        @include('partials.user-toolbar')
    @endif

    <div class="row app-container mg-top">

        <div class="row">

            <div class="col s12">
                <h4>Report for {{ $application->name }}</h4>  
                <p>Key : {{ $application->key }}</p> 
                <p>Type : {{ $application->type }}</p>
                <p>Developer : {{ $application->user->name }} ({{ $application->user->email }})</p>
            </div>

        </div>

        <div class="row" id="total-view">
            <div class="col s6">
                <div class="row">
                    <div class="col s12 total-block" style="margin-bottom:10px;">
                        <h5>Users</h5>
                    
                        <div class="total indigo-text">
                            {{ $total_users }}
                        </div>
                        
                    </div>

                    <div class="col s12 total-block">
                        <h5>Total Hits</h5>
                            
                        <div class="total indigo-text">
                            @if( isset($analytic->api_key->data[0]))
                            {{ $analytic->api_key->data[0]->hit }}
                            @else
                            0
                            @endif
                        </div>
                        
                    </div>
                </div>
                
            </div>

            <div class="col s6">
                <h5>Endpoint Hits</h5>
                    
                <div class="total indigo-text">
                    <table class="bordered">
                        @if( isset($analytic->endpoint->data[0]))
                            @foreach($analytic->endpoint->data as $data)
                                <tr>
                                    <td>{{ $data->info }}</td>
                                    <td>{{ $data->hit }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
                
            </div>
        </div>

        <div class="row">

           <input type="hidden" id="analytic-app" value="{{ $application->key }}">

           @include('partials.analytic-views', ['isDashboard' => false])
            
        </div>
        
    </div>

@endsection

@section('foot-js')

    <script type="text/javascript" src="{{ url('js/analytic.js') }}"></script>

    <script>

        fetchData('{{ route('api.analytic.data') }}?api_key={{ $application->key }}');

        fetchTotalHits('{{ route('api.analytic.total_hits') }}?api_key={{ $application->key }}');

    </script>

@endsection