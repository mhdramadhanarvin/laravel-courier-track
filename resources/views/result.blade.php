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
            <td align="left">{{ $data->summary->courier }} - Sameday</td>
        </tr>
        <tr>
            <td align="left">Tracking Code</td>
            <td align="left">:</td>
            <td align="left">JP0198497048</td>
        </tr>
        <tr>
            <td align="left">Status</td>
            <td align="left">:</td>
            <td align="left">DELIVERED</td>
        </tr>
        <tr>
            <td align="left">Last Updates</td>
            <td align="left">:</td>
            <td align="left">2022-05-18 11:04:51</td>
        </tr>
        <tr class="lh-sm">
            <td align="left">Origin</td>
            <td align="left">:</td>
            <td align="left">Labuhan Batu Utara - Dinda</td>
        </tr>
        <tr>
            <td align="left">Destination</td>
            <td align="left">:</td>
            <td align="left">Medan - Madhan</td>
        </tr>
        <tr>
            <td colspan="2" scope="col" align="left"><h3>History</h3></th>
        </tr>
        <tr class="lh-sm">
            <td align="left">2022-05-18 11:04:51</td>
            <td align="left"></td>
            <td align="left">TERKIRIM: DROP POINT [DELI SERDANG] (DITERIMA OLEH: MHD RAMADHAN ARVIN)</td>
        </tr>
        <tr class="lh-sm">
            <td align="left">2022-05-18 11:04:51</td>
            <td align="left"></td>
            <td align="left">TELAH TIBA: DROP POINT [DELI SERDANG] DARI [MES_GATEWAY]</td>
        </tr>
    </table>
    </p>
@endsection
