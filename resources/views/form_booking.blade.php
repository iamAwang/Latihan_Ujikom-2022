@extends('layouts.app')
@section('content')

@php
    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
@endphp

<div class="m-5">
    <form action="<?php @$edit!=null? printf(route('updateBooking',[$edit->id])) : printf(route('storeBooking'))?>" method="POST">
        @csrf
        <div class="form-floating mb-3" >
            <input type="text" class="form-control" id="floatingInput" placeholder="nama pemesan" name="name" value="<?php if(@$edit!=null) printf($edit->name)?>"/>
            <label for="floatingInput">Nama Pemesan</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" onfocus="this.showPicker()" placeholder="tanggal pemesan" name="date" value="<?php if(@$edit!=null) printf($edit->date)?>"/>
            <label for="floatingInput">Tanggal Pemesan</label>
        </div>
        <div class="form-floating">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="film" value="<?php if(@$edit!=null) printf($edit->film)?>">
            <option selected>Pilih Judul Film</option>
            @foreach ($films as $film)
                @if (@$edit->film->id == $film->id)
                    <option value="{{$film->id}}" selected>{{$film->title}}</option>
                @else
                    <option value="{{$film->id}}">{{$film->title}}</option>
                @endif
            @endforeach
            </select>
            <label for="floatingSelect">Pilih Judul Film</label>
        </div>
        <br>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" placeholder="jumlah penonton" name="amount" value="<?php if(@$edit!=null) printf($edit->amount)?>"/>
            <label for="floatingInput">Jumlah Penonton</label>
        </div>
        <button type="submit" class="btn btn-secondary btn-lg" style="float: right;">Tambahkan</button>
        <button type="submit" class="btn btn-secondary btn-lg" style="float: left"><a href="{{route('indexBooking')}}" style="text-decoration: none; color: white">Kembali</a></button>
    </form>
</div>
@endsection