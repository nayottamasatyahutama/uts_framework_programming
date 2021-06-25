@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-12" style="padding: 30px;">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <div style="flex-direction: row; display: flex; justify-content: flex-end; align-items: center">
            <h1 class="display-5" style="text-align: center">Toko Buku 18090004</h1>
            <a class="btn btn-danger" href="{{ route('logout')}}" style="width: 100px; margin-left: 20vw;">Logout</a>
        </div>
        <div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center">
            <a style="margin-top: 19px; margin-bottom: 19px;" href="{{ route('bukus.create')}}" class="btn btn-success">New Buku</a>
            <a style="margin-top: 19px; margin-bottom: 19px;" href="{{ URL::to('/daftarBuku/pdf') }}" target="_blank" class="btn btn-info">PDF</a>
        </div>
        <h6 style="margin-bootom: 19px;">Koleksi Buku :</h6>
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Judul Buku</td>
                    <td>Penulis</td>
                    <td>Penerbit</td>
                    <td>Sampul Buku</td>
                    <td colspan=2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($buku as $buku)
                <tr>
                    <td>{{$buku->id}}</td>
                    <td>{{$buku->judul_buku}}</td>
                    <td>{{$buku->penulis}}</td>
                    <td>{{$buku->penerbit}}</td>
                    <td><img width="150px" src="{{ url('/data_file/'.$buku->img) }}"></td>
                    <td class="row">
                        <a href="{{ route('bukus.edit',$buku->id)}}" class="btn btn-warning" style="width: 100px;">Edit</a>
                        <form action="{{ route('bukus.destroy', $buku->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" style="width: 100px; margin-left: 30px;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
        </div>
        @endsection