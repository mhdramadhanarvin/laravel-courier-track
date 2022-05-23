@extends('layouts.app')

@section('content')
    <h1 class="pt-5 mt-5">Track Courier.</h1>
    <p class="lead">You don't know where your courier is? Track it here!!!.</p>
    <p class="lead">
    <form method="POST" action="{{ route('track') }}">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible p-2 fade show" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br />
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row justify-content-center mb-3">
            <label for="tracking_code" name="tracking_code" class="form-label">Enter tracking
                number</label>
            <div class="col-11">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="tracking_code" name="tracking_code"
                        placeholder="Enter tracking code here">
                    <select class="form-select" id="courier" name="courier">
                        <option selected value="">Select courier...</option>
                        @foreach ($couriers as $courier)
                            <option value="{{ $courier->code }}">{{ $courier->description }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Track Now</button>
    </form>
    </p>
@endsection
