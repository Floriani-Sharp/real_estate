@extends('layouts.master')

@section('title')
    Logements
@endsection

@push('style')
    <style>
        .card-body .col-12 , .card-body {
            padding: 0 ;
        }

        .card-body .details {
            padding: .4rem 1.5rem .5rem 1.5rem!important ;
        }

        .card-body .details .cost {
            color:#7367F0 ;
            text-decoration: underline ;
        }

        .description {
            hyphens: auto ;
        }
    </style>
@endpush

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            @foreach ($lodgings as $lodge) 
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 pb-1">
                                    <img src="{{ $lodge->getMedia('images')->first()->getUrl() }}" 
                                    class="w-100" alt="">
                            </div>
                            <div class="details col-12">
                                <h3 class="cost">
                                        {{ number_format($lodge->cost,0,'' , ' ') }}
                                        $
                                </h3>
                            </div>
                            <div class="details description text-justify">
                                {{ Str::limit($lodge->description, 80, '...') }}
                            </div>
                            <div class="details col-12">
                                <div class="row">
                                    <div class="col-1">
                                        <i data-feather="map-pin"></i>
                                    </div>
                                    <div class="col-11">
                                        <h4>
                                            {{ $lodge->city->name }}  {{ $lodge->city->state->name }} ,
                                            {{ $lodge->city->state->country->name }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="details col-12">
                                <div class="row">
                                    <div class="col-1">
                                        <i data-feather="phone-call"></i>
                                    </div>
                                    <div class="col-11 text-justify">
                                        <h4>{{ $lodge->contact }}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="details col-12 m-2">
                                <a class="btn btn-md btn-primary waves-effect waves-float waves-dark" 
                                    href="{{ route('logements.show' , $lodge) }}">
                                    Voir les détails
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection