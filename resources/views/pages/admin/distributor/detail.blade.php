@extends('layouts.admin.main')

@section('title', 'Detail Distributor')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Distributor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.distributor') }}">Distributor</a></div>
                <div class="breadcrumb-item">Detail</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Detail Distributor: {{ $distributor->name_distributor }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>{{ $distributor->name }}</h4>
                        <p><strong>Nama Distributor: </strong>{{ $distributor->name_distributor }}</p>
                        <p><strong>Kota: </strong>{{ $distributor->kota }}</p>
                        <p><strong>Provinsi: </strong>{{ $distributor->provinsi }}</p>
                        <p><strong>Kontak: </strong>{{ $distributor->kontak }}</p>
                        <p><strong>Email: </strong>{{ $distributor->email }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('distributor.edit', $distributor->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('distributor.delete', $distributor->id) }}" class="btn btn-danger" data-confirm-delete="true">Hapus</a>
                <a href="{{ route('admin.distributor') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </section>
</div>
@endsection