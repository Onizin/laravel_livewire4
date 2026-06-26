@extends('layouts.app')

@section('title','Data Barang')
@section('menuAdminBarang','active')

@section('content')
    @livewire('admin.barang.index')
@endsection