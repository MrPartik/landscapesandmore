@extends('layouts.pdf')
@section('body')
    <div>
        <h1 style="font-weight: bold; font-size: 20px; margin-bottom: 10px">Warranty Record.</h1>
        <p style="font-size: 10px; margin-bottom: 10px">Generated at: {{ now() }}</p>
        <table style="margin-bottom: 10px; border: 1px  solid salmon; float: right !important;">
            <tr>
                <th>Summary</th>
                <th>Count</th>
            </tr>
            <tr>
                <td>All data</td>
                <td>{{ $total }}</td>
            </tr>
            <tr>
                <td>Contacted and not yet contacted</td>
                <td>{{ $contacted }} | {{ $not_contacted }}</td>
            </tr>
            <tr>
                <td>Resolved and not yet resolved</td>
                <td>{{ $resolved }} | {{ $not_resolved }}</td>
            </tr>
            <tr>
                <td>Not serviceable area</td>
                <td>{{ $serviceable_area }}</td>
            </tr>
        </table>
        <table style="width: 100%; border: 1px  solid gray; padding: 10px">
            <tr>
                <th>Personal Information</th>
                <th>Was Resolved</th>
                <th>Was Contacted</th>
                <th>Remarks</th>
                <th>Updated at</th>
            </tr>
            @foreach($aModel as $item)
                <tr>
                    @php
                        $sPersonalInfo = '';
                        $sPersonalInfo .= sprintf('<strong>Reference No: </strong>%s<br/>', $item->reference_no);
                        $sPersonalInfo .= sprintf('<strong>Name: </strong>%s<br/>', $item->last_name . ', ' . $item->first_name);
                        $sPersonalInfo .= sprintf('<strong>Email: </strong>%s<br/>', $item->email);
                        $sPersonalInfo .= sprintf('<strong>Phone: </strong>%s<br/>', $item->phone);
                        $sPersonalInfo .= sprintf('<span class="%s"><strong>Zip Code: </strong>%s</span><br/>', ((in_array($item->zip_code, config('landscaping.allowed_zip_code')) === false ? 'text-danger text' : '')), $item->zip_code);
                    @endphp
                    <td>{!! $sPersonalInfo !!}</td>
                    <td>{!! (($item->was_resolved) ? \Carbon\Carbon::make($item->was_resolved)->format('Y-m-d H:i') : '<span class="text-danger">Not Resolved</span>') !!}</td>
                    <td>{!! (($item->was_contacted) ? \Carbon\Carbon::make($item->was_contacted)->format('Y-m-d H:i') : '<span class="text-danger">Not Contacted</span>') !!}</td>
                    <td>{{ $item->remarks }}</td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
