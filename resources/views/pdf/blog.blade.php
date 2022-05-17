@extends('layouts.pdf')
@section('body')
    <div>
        <h1 style="font-weight: bold; font-size: 20px; margin-bottom: 10px">List of all blog created.</h1>
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
                <td>Active data</td>
                <td>{{ $active }}</td>
            </tr>
            <tr>
                <td>In-active data</td>
                <td>{{ $inactive }}</td>
            </tr>
        </table>
        <table style="width: 100%; border: 1px  solid gray; padding: 10px">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Tags</th>
                <th>Status</th>
                <th>Updated at</th>
            </tr>
            @foreach($aModel as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->tags }}</td>
                    <td>{{ $item->is_active ? 'Active' : 'In-active' }}</td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
