@extends('layouts.master')

@section('content')
<section id="basic-horizontal-layouts">
    <div class="row">
        <div class="col-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  @foreach ($lodge->getMedia('images') as $key => $media) 
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                  @endforeach
                </ol>
                <div class="carousel-inner">
                  @foreach ($lodge->getMedia('images') as $media) 
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                      <img class="h-100 d-block w-100" src="{{ $media->getUrl() }}" alt="First slide">
                    </div>
                  @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-6 py-2 px-3">
            <h3 class="text-primary">
                {{ $lodge->city->state->name }} {{ $lodge->city->name }} ,
                {{ $lodge->city->state->country->name }}
            </h3>

            <p class="mt-4 pr-3 text-justify text-bold">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Ratione laborum quo quos omnis sed magnam id, ducimus saepe, 
                debitis error earum, iste dicta odio est sint dolorem magni animi tenetur.

                Perferendis eligendi reprehenderit, assumenda molestias nisi eius iste 
                reiciendis porro tenetur in, repudiandae amet libero. Doloremque, reprehenderit 
                cupiditate error laudantium qui, esse quam debitis, eum cumque perferendis, 
                illum harum expedita.
            </p>

            <h3 class="mt-2 text-primary">
                {{ number_format($lodge->cost , 0 , '' , ' ') }}$
            </h3>

            <div class="row mt-2">
                <div class="col-1">
                    <h4><i data-feather="phone-call"></i></h4>
                </div>
                <div class="col-10">
                    <h4>{{ $lodge->contact  }}</h4>
                </div>
            </div>

            @auth
                {{-- @if (Auth::user()->role == 'tenant')  --}}
                    <div class="row mt-2">
                        <div class="col-10">
                            <a class="btn btn-md btn-outline-success" 
                                    onclick="showModal()" role="button">
                                
                                Contacte le vendeur
                            </a>
                        </div>
                    </div>
                {{-- @endif --}}
            @endauth
        </div>
    </div>
</section>
@endsection

@section('modal')
<div class="modal fade text-left" id="contact-modal" data-keyboard="false" data-backdrop="static"
        tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Contactez le vendeur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <label>Email: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Email Address" class="form-control" />
                    </div>

                    <label>Téléphone: </label>
                    <div class="form-group">
                        <input type="password" placeholder="Téléphone" class="form-control" />
                    </div>

                    <label>Message: </label>
                    <div class="form-group">
                        <textarea name="" id="" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@push('script')
    <script>
        function showModal() {
            $("#contact-modal").modal("show")
        }
    </script>
@endpush