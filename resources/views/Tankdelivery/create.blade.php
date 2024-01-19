@extends('layout.main')

@section('title', 'Tank Order Delivery')
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

                                    <form method="POST" action="{{ route('tankdelivery.store') }}">
                                        @csrf
                                        <div class="border-radius-xl bg-white js-active" data-animation="FadeIn">
                                            <h5 class="font-weight-bolder mb-0">@yield('title')</h5>
                                            <p class="mb-0 text-sm">Isi</p>
                                            <div class="multisteps-form__content">
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="input-group input-group-static ">
                                                            <label class="">Delivery Order Number</label>
                                                            <input
                                                                class="form-control @error('id_don') is-invalid @enderror"
                                                                name="id_don" id="id_don" value="{{ old('id_don') }}"
                                                                type="text" onfocus="focused(this)"
                                                                onfocusout="defocused(this)" required>
                                                            @error('id_don')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror

                                                            {{-- <label class="ms-0">Tank Name</label>
                                                            <select class="form-control" id="id_tank_report"
                                                                name="id_tank_report" required>
                                                                <option value="" disabled selected hidden>Select a
                                                                    Tank Name</option>
                                                                @foreach ($tank as $t)
                                                                    <option value="{{ $t->id }}">
                                                                        {{ $t->tank->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                        <div class="input-group input-group-static">
                                                            <label class="">Driver ID/Name</label>
                                                            <input
                                                                class="form-control @error('driver') is-invalid @enderror"
                                                                name="driver" id="driver" value="{{ old('driver') }}"
                                                                type="text" onfocus="focused(this)"
                                                                onfocusout="defocused(this)" required>
                                                            @error('driver')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="input-group input-group-static ">
                                                            <label class="">Tanker / Vehicle Number</label>
                                                            <input
                                                                class="form-control @error('vehicle_number') is-invalid @enderror"
                                                                name="vehicle_number" id="vehicle_number"
                                                                value="{{ old('vehicle_number') }}" type="text"
                                                                onfocus="focused(this)" onfocusout="defocused(this)"
                                                                required>
                                                            @error('vehicle_number')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror

                                                            {{-- <label class="ms-0">Tank Name</label>
                                                            <select class="form-control" id="id_tank_report"
                                                                name="id_tank_report" required>
                                                                <option value="" disabled selected hidden>Select a
                                                                    Tank Name</option>
                                                                @foreach ($tank as $t)
                                                                    <option value="{{ $t->id }}">
                                                                        {{ $t->tank->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                        <div class="input-group input-group-static">
                                                            <label class="ms-0">Supplier / Company</label>
                                                            <select class="form-control" id="id_supplier" name="id_supplier"
                                                                required>
                                                                <option value="" disabled selected hidden>Select a
                                                                    supplier Name</option>
                                                                @foreach ($supplier as $t)
                                                                    <option value="{{ $t->id }}">
                                                                        {{ $t->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="input-group input-group-static ">
                                                            <label class="ms-0">Drop To Tank</label>
                                                            <select class="form-control" id="id_tank" name="id_tank"
                                                                required>
                                                                <option value="" disabled selected hidden>Select a
                                                                    Tank Name</option>
                                                                @foreach ($tank as $t)
                                                                    <option value="{{ $t->id }}">
                                                                        {{ $t->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                        <div class="input-group input-group-static">
                                                            <label class="ms-0">Supplier / Company</label>
                                                            <select class="form-control" id="id_supply" name="id_supply"
                                                                required>
                                                                <option value="" disabled selected hidden>Select a
                                                                    Supply Name</option>
                                                                @foreach ($supply as $t)
                                                                    <option value="{{ $t->id }}">
                                                                        {{ $t->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="input-group input-group-static ">
                                                            <label class="">D.O. Volume</label>
                                                            <input
                                                                class="form-control @error('do_volume') is-invalid @enderror"
                                                                name="do_volume" id="do_volume"
                                                                value="{{ old('do_volume') }}" type="number"
                                                                onfocus="focused(this)" onfocusout="defocused(this)"
                                                                required>
                                                            @error('do_volume')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                </div>
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
