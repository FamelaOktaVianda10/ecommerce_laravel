@extends('layouts.admin.main')
@section('title', 'Admin Tambah Distributor')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Distributor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.distributor') }}">Distributor</a></div>
                <div class="breadcrumb-item">Tambah Distributor</div>
            </div>
        </div>
        <a href="{{ route('admin.distributor') }}" class="btn btn-icon icon-left btn-warning"> Kembali</a>
        <div class="card mt-4">
            <form action="{{ route('distributor.store') }}" class="needs-validation" novalidate="" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name_distributor">Nama Distributor</label>
                                <input id="name_distributor" type="text" class="form-control" name="name_distributor"
                                    required="">
                                <div class="invalid-feedback">
                                    Nama distributor harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <input id="kota" type="text" class="form-control" name="kota" required="">
                                <div class="invalid-feedback">
                                    Kota harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input id="provinsi" type="text" class="form-control" name="provinsi" required="">
                                <div class="invalid-feedback">
                                    Provinsi harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="kontak">Kontak</label>
                                <input id="kontak" type="text" class="form-control" name="kontak"
                                    value="{{ old('kontak') }}" required="">
                                <div class="invalid-feedback">
                                    Kontak harus diisi!
                                </div>
                                @error('kontak')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required="">
                                <div class="invalid-feedback">
                                    Email harus diisi!
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-plus"></i> Tambah Distributor
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection