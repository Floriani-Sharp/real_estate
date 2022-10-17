@extends('layouts.master')

@push('style')
<link rel="stylesheet" href="{!!asset('/app-assets/vendors/css/forms/select/select2.min.css')!!}">
<style>
    .select2-container--default .select2-selection--single .select2-selection__arrow b{
        border: none !important ;
        position: relative !important;
        left: 0 !important;
        top: 40% !important;
    }
</style>
@endpush
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Mettre un logement en vente
                        </h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('logements.store') }}" 
                                 enctype="multipart/form-data"   method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3 col-form-label">
                                            <label for="size">Superficie(en m2) <span class="text-danger">*</span>
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="integer" id="size" class="form-control @error('size') is-invalid @enderror" 
                                               value="{{ old('size') }}" name="size" placeholder="220" />
                                        </div>
                                        @error('size')
                                            <small class="text-danger" role="alert">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3 col-form-label">
                                            <label for="description">Description<span class="text-danger">*</span>
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea rows="3" id="description" class="form-control @error('description') is-invalid @enderror" 
                                               value="{{ old('description') }}" name="description" placeholder="Description" ></textarea>
                                        </div>
                                        @error('description')
                                            <small class="text-danger" role="alert">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3 col-form-label">
                                            <label for="cost">Montant(en $) <span class="text-danger">*</span>

                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="integer" id="cost" class="form-control @error('cost') is-invalid @enderror" 
                                               value="{{ old('cost') }}" name="cost" placeholder="120000" />
                                        </div>
                                        @error('cost')
                                            <small class="text-danger" role="alert">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                               <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3 col-form-label">
                                            <label for="pictures">Choisir les images <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="file" multiple id="pictures" class="form-control  @error('pictures') is-invalid @enderror" 
                                            name="pictures[]" placeholder="99445241" />
                                        </div>
                                    </div>
                                    @error('pictures')
                                        <small class="text-danger" role="alert">{{ $message }}</small>
                                    @enderror
                                </div>

                               <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3 col-form-label">
                                            <label for="city_id" class="form-label">Ville <span class="text-danger">*</span></label>
                                        </div>
    
                                       <div class="col-md-9">
                                            <select name="city_id" class="select2 form-control form-control-lg" required 
                                                data-placeholder="Choisir le city_id" id="city_id">
                                                
                                            </select>
                                       </div>
                                        @error('city_id')
                                            <small class="text-danger" role="alert">{{ $message }}</small>
                                        @enderror
                                    </div>
                               </div>

                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3 col-form-label">
                                            <label for="contact">Téléphone du vendeur <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="number" id="contact" class="form-control  @error('contact') is-invalid @enderror" 
                                              value="{{ old('contact') }}" name="contact" placeholder="99445241" />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-9 offset-md-3">
                                    <a href="{{ URL::previous() }}"  class="btn btn-danger">Annuler</a>
                                    <button type="submit" class="btn btn-success mr-1">Vendre</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{!! asset('app-assets/vendors/js/forms/select/select2.full.min.js') !!}"></script>
    <script>
        let route = '{{ route('getCities') }}'
        $('#city_id').select2({
            allowClear: true,
            language:'fr' ,
            placeholder: "Choisir le produit",
            ajax: {
                url: function (params) {
                    return route + "?search=" + params.term ;
                },
                success:function(data){
                },
                error:function(err){
                    console.log(err)
                },
                dataType: 'json',
                delay: 250,
                minimumInputLength: 2,
                processResults: function (data) {
                    result = [];
                    data.forEach((city , index) => { 
                        result.push({id: city.id, 
                                    text: city.name
                                })
                    });
                    return {
                        results: result
                    };
                }
            }
        })
    </script>
@endpush