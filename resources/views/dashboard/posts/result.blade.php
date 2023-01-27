@extends('dashboard.layouts.main')

@section('container')
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <h2>Result
    </h2>
    @if(count($posts)>0)
        <table class="table table-bordered table-striped">
            <thead>
                <th style="text-align: center">Post</th>
                <th style="text-align: center">Tanggal Diposting</th>
                <th style="text-align: center">Total Penjualan</th>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ date('M d, Y h:i A', strtotime($post->created_at)) }}</td>
                        <td>{{ $post->qty }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <h3>Tidak ada postingan ditanggal berikut</h3>
    @endif
    <a href="/dashboard/posts" class="btn btn-primary pull-right">Kembali</a>
</div>
</div>
@endsection