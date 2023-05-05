@extends('layouts.app')
@section('content')

@php
    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
@endphp

<div class="m-5">
    <form action="<?php @$edit!=null? printf(route('updateFilm',[$edit->id])) : printf(route('storeFilm'))?>" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3" >
            <input type="text" class="form-control" id="floatingInput" placeholder="judul film" name="title" value="<?php if(@$edit!=null) printf($edit->title)?>"/>
            <label for="floatingInput">Judul Film</label>
        </div>
        <div class="form-floating mb-3" >
            <input type="file" class="form-control" id="floatingInput" placeholder="poster" name="poster" value="<?php if(@$edit!=null) printf($edit->poster)?>"/>
            <label for="floatingInput">Poster</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="durasi film" name="duration" value="<?php if(@$edit!=null) printf($edit->duration)?>"/>
            <label for="floatingInput">Durasi Film</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" placeholder="harga tiket / orang" name="price" value="<?php if(@$edit!=null) printf($edit->price)?>"/>
            <label for="floatingInput">Harga Tiket / Orang</label>
        </div>
        <div class="form-floating mb-3">
            <input type="time" class="form-control" id="floatingInput" onfocus="this.showPicker()" placeholder="jam tayang" name="time" value="<?php if(@$edit!=null) printf($edit->time)?>"/>
            <label for="floatingInput">Jam Tayang</label>
        </div>
        <button type="submit" class="btn btn-secondary btn-lg" style="float: right;">Tambahkan</button>
        <button type="submit" class="btn btn-secondary btn-lg" style="float: left"><a href="{{route('indexFilm')}}" style="text-decoration: none; color: white">Kembali</a></button>
    </form>
</div>
@endsection