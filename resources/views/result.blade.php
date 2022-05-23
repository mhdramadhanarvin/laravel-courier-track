@extends('layouts.app')

@section('content')
    <h1>Track Courier.</h1>
    <p class="lead">
    <table class="table table-borderless text-light">
        <tr>
            <td colspan="2" scope="col" align="left"><h3>Summary</h3></th>
        </tr>
        <tr class="lh-sm">
            <td align="left">Courier</td>
            <td align="left">:</td>
            @if (empty($data->summary->service))
            <td align="left">{{ $data->summary->courier}}</td>
            @else
            <td align="left">{{ $data->summary->courier . ' - ' . $data->summary->service}}</td>
            @endif
        </tr>
        <tr>
            <td align="left">Tracking Code</td>
            <td align="left">:</td>
            <td align="left">{{ $data->summary->awb}}</td>
        </tr>
        <tr>
            <td align="left">Status</td>
            <td align="left">:</td>
            <td align="left">{{ $data->summary->status}}</td>
        </tr>
        <tr>
            <td align="left">Last Updates</td>
            <td align="left">:</td>
            <td align="left">{{ \Carbon\Carbon::parse($data->summary->date)->format('d F Y H:i') }}</td>
        </tr>
        <tr class="lh-sm">
            <td align="left">Origin</td>
            <td align="left">:</td>
            <td align="left">{{ $data->detail->origin . " - " . $data->detail->shipper }}</td>
        </tr>
        <tr>
            <td align="left">Destination</td>
            <td align="left">:</td>
            <td align="left">{{ $data->detail->destination . " - " . $data->detail->receiver }}</td>
        </tr>
        <tr>
            <td colspan="2" scope="col" align="left"><h3>History</h3></th>
        </tr>
        @foreach ($data->history as $key => $history)
            <tr class="lh-sm">
                @if ($key == 0)
                <td align="left" class="fw-bold">{{ \Carbon\Carbon::parse($history->date)->format('d F Y H:i') }}</td>
                <td align="left" class="fw-bold"></td>
                <td align="left" class="fw-bold">{{ $history->desc }}</td>
                @else
                <td align="left">{{ \Carbon\Carbon::parse($history->date)->format('d F Y H:i') }}</td>
                <td align="left"></td>
                <td align="left">{{ $history->desc }}</td>
                @endif
            </tr>
        @endforeach
    </table>
    </p>
@endsection
