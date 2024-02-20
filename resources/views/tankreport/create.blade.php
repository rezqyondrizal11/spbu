@extends('layout.main')

@section('title', 'Isi Tank Hari Ini')
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

                                    <form method="POST" action="{{ route('tankreport.store') }}" style="height: 281px;">
                                        @csrf
                                        <div class="border-radius-xl bg-white js-active" data-animation="FadeIn">
                                            <h5 class="font-weight-bolder mb-0">@yield('title')</h5>
                                            <p class="mb-0 text-sm">Isi</p>
                                            <div class="multisteps-form__content">
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="input-group input-group-static ">
                                                            <label class="ms-0">Tank Name</label>
                                                            <select class="form-control" id="id_tank" name="id_tank"
                                                                required>
                                                                <option value="" disabled selected hidden>Select a
                                                                    Tank Name</option>
                                                                @foreach ($tank as $t)
                                                                    <option value="{{ $t->id }}"  data-stok-max="{{ $t->capacity }}">
                                                                        {{ $t->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                        <div class="input-group input-group-static">
                                                            <label class="">Capacity Today</label>
                                                            <input
                                                                class="form-control @error('kapasitas_awal') is-invalid @enderror"
                                                                name="kapasitas_awal" id="kapasitas_awal"
                                                                value="{{ old('kapasitas_awal') }}" type="number"
                                                                onfocus="focused(this)" onfocusout="defocused(this)"
                                                                required>
                                                            @error('kapasitas_awal')
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
<script>
       document.addEventListener("DOMContentLoaded", function() {
        var tankSelect = document.getElementById("id_tank");
        var kapasitasInput = document.getElementById("kapasitas_awal");

        tankSelect.addEventListener("change", function() {
            var selectedTank = tankSelect.options[tankSelect.selectedIndex];
            var stokMax = selectedTank.getAttribute("data-stok-max");
            kapasitasInput.setAttribute("max", stokMax);
        });
    });
</script>