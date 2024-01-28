@extends('layout.main')

@section('title', 'Edit Product Price')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="multisteps-form mb-9">

                    <div class="row">
                        <div class="col-12 col-lg-8 mx-auto my-5">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-8 m-auto">
                            <div class="card">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">

                                    </div>
                                </div>
                                <div class="card-body">

                                    <form method="POST" action="{{ route('tankgrade.update') }}" style="height: 281px;">

                                        @csrf
                                        @method('PUT')
                                        <div class="border-radius-xl bg-white js-active" data-animation="FadeIn">
                                            <h5 class="font-weight-bolder mb-0">@yield('title')</h5>
                                            <p class="mb-0 text-sm">Product Priceinformations</p>
                                            <div class="multisteps-form__content">
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="input-group input-group-static">
                                                            <label class="ms-0">Nama</label>
                                                            <input class="form-control @error('name') is-invalid @enderror"
                                                                name="name" id="name" value="{{ $data->name }}"
                                                                type="text" onfocus="focused(this)"
                                                                onfocusout="defocused(this)" required>
                                                            @error('name')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                        <div class="input-group input-group-static">
                                                            <label class="">Harga</label>
                                                            <input class="form-control @error('harga') is-invalid @enderror"
                                                                name="harga" id="harga"
                                                                value="{{ old('harga', $data->harga) }}" type="number"
                                                                onfocus="focused(this)" onfocusout="defocused(this)"
                                                                required>

                                                            @error('harga')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror


                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" value="{{ $data->id }}" name="id">
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn bg-gradient-primary ms-auto mb-0" type="submit"
                                                        title="Save">Save</button>

                                                </div>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
