@extends('layout.main')

@section('title', 'Create Tank')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class=" mb-9">

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

                                    <form method="POST" action="{{ route('tank.store') }}">
                                        @csrf
                                        <div class="border-radius-xl bg-white" data-animation="FadeIn">
                                            <h5 class="font-weight-bolder mb-0">@yield('title')</h5>
                                            <p class="mb-0 text-sm">Tank informations</p>
                                            <div class="">
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="input-group input-group-static">
                                                            <label class="ms-0">Tank Name</label>
                                                            <input class="form-control @error('name') is-invalid @enderror"
                                                                name="name" id="name" type="text"
                                                                onfocus="focused(this)" onfocusout="defocused(this)"
                                                                required>
                                                            @error('name')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                        <div class="input-group input-group-static">
                                                            <label for="id_grade" class="ms-0">Grade
                                                            </label>
                                                            <select class="form-control" id="id_grade" name="id_grade"
                                                                required>
                                                                <option value="" disabled selected hidden>Select a
                                                                    Grade</option>
                                                                @foreach ($grade as $g)
                                                                    <option value="{{ $g->id }}">
                                                                        {{ $g->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="input-group input-group-static">
                                                            <label class="ms-0">Number</label>

                                                            <input
                                                                class="form-control @error('number') is-invalid @enderror"
                                                                name="number" id="number" type="text"
                                                                onfocus="focused(this)" onfocusout="defocused(this)"
                                                                required>
                                                            @error('number')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                        <div class="input-group input-group-static ">
                                                            <label class="ms-0">Description</label>

                                                            <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" onfocus="focused(this)"
                                                                onfocusout="defocused(this)">
                                                            </textarea>
                                                            @error('desc')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="input-group input-group-static">
                                                            <label class="ms-0">Physical Label</label>

                                                            <input class="form-control @error('label') is-invalid @enderror"
                                                                name="label" id="label" type="text"
                                                                onfocus="focused(this)" onfocusout="defocused(this)">
                                                            @error('label')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                        <div class="input-group input-group-static ">
                                                            <label class="ms-0">Capacity</label>
                                                            <input
                                                                class="form-control @error('capacity') is-invalid @enderror"
                                                                name="capacity" id="capacity" type="number"
                                                                onfocus="focused(this)" onfocusout="defocused(this)"
                                                                required>
                                                            @error('desc')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="input-group input-group-static">
                                                            <label class="ms-0">Diameter</label>

                                                            <input
                                                                class="form-control @error('diameter') is-invalid @enderror"
                                                                name="diameter" id="diameter" type="text"
                                                                onfocus="focused(this)" onfocusout="defocused(this)"
                                                                step="0.01" required>
                                                            @error('diameter')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                        <div class="input-group input-group-static ">
                                                            <label class="ms-0">Tank Type</label>
                                                            <select class="form-control" id="id_type" name="id_type"
                                                                required>
                                                                <option value="" disabled selected hidden>Select a
                                                                    Type</option>
                                                                @foreach ($type as $t)
                                                                    <option value="{{ $t->id }}">
                                                                        {{ $t->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
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
