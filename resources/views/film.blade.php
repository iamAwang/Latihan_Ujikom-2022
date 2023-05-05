@extends('layouts.app')
@section('content')

<div class="m-5">
<a class="btn btn-primary" href="{{route('createFilm')}}" style="margin-bottom: 25px">Tambah Film +</a>
<a class="btn btn-primary" href="{{route('home')}}" style="margin-bottom: 25px">Home</a>
<table class="table table-bordered" style="text-align: center">

    @php
        function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;
        }
    @endphp
    
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Film</th>
            <th>Poster</th>
            <th>Durasi Film</th>
            <th>Harga Tiket / Orang</th>
            <th>Jam Tayang</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no=$films->firstItem()
        @endphp
        @foreach ($films as $film)
        <tr>
            <td>{{$no}}</td>
            <td>{{$film->title}}</td>
            <td><a target="_blank" href="{{asset('storage/photos')}}/{{$film->poster}}">
                <img src="{{asset('storage/photos')}}/{{@$film->poster}}" alt="film" srcset="" style="height: 20%; width: 20%"/></a></td>
            <td>{{$film->duration}}</td>
            <td>{{rupiah($film->price)}}</td>
            <td>{{$film->time}}</td>
            <td><button class="badge text-bg-warning"><a href="{{route('editFilm',$film->id)}}" style="text-decoration: none; color:white">Edit</a></button></td>
            <td><form action="{{route('deleteFilm',@$film->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this film?')">
                @csrf
                <button type="submit" class="badge text-bg-danger">Delete</button></td>
        </tr>
        @php
            $no++;
        @endphp
        @endforeach
    </tbody>
  </table>
  {{$films->Links()}}
</div>
@endsection