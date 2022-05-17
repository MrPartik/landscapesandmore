@extends('layouts.pdf')
@section('body')
    <div>
        <h1 style="font-weight: bold; font-size: 20px; margin-bottom: 10px">Customer Reviews Record.</h1>
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
                <td>Rating: ★★★★★</td>
                <td>{{ $star5 }}</td>
            </tr>
            <tr>
                <td>Rating: ★★★★☆</td>
                <td>{{ $star4 }}</td>
            </tr>
            <tr>
                <td>Rating: ★★★☆☆</td>
                <td>{{ $star3 }}</td>
            </tr>
            <tr>
                <td>Rating: ★★☆☆☆</td>
                <td>{{ $star2 }}</td>
            </tr>
            <tr>
                <td>Rating: ★☆☆☆☆</td>
                <td>{{ $star1 }}</td>
            </tr>
        </table>
        <table style="width: 100%; border: 1px  solid gray; padding: 10px">
            <tr>
                <th width="100px">Review Stars</th>
                <th>Review Titles</th>
                <th>Review Description</th>
                <th>Created at</th>
            </tr>
            @foreach($aModel as $item)
                <tr>
                    @php
                        $aRatingHtml = '<span style="font-size: 15px;">
                                            <span class="fa fa-star"> ' . (($item->rating >= 1) ? '★' : '☆') . '</span>
                                            <span class="fa fa-star"> ' . (($item->rating >= 2) ? '★' : '☆') . '</span>
                                            <span class="fa fa-star"> ' . (($item->rating >= 3) ? '★' : '☆') . '</span>
                                            <span class="fa fa-star"> ' . (($item->rating >= 4) ? '★' : '☆') . '</span>
                                            <span class="fa fa-star"> ' . (($item->rating >= 5) ? '★' : '☆') . '</span>
                                        </span>';
                    @endphp
                    <td>{!! $aRatingHtml !!}</td>
                    <td>
                        <span style="font-weight: bold">Summary: </span> {{ $item->summary }} <br/>
                        <span style="font-weight: bold">Snippet: </span> {{ $item->snippet }}
                    </td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
