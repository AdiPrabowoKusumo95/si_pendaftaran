@extends('layouts2.app')
@section('content')
    <div class="card">
        <div class="card-header">{{ $title }}</div>
        {{-- {{route('administrator.pengguna.store')}} --}}
        <form action="{{route('administrator.pengguna.store')}}" method="post">
            <div class="card-body">
                @csrf
                <div class="form-group mb-3">
                    <label for="">Nama</label>
                    <input type="text" name="name" placeholder="Masukkan Nama Lengkap Anda" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Masukkan Email Anda" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Masukkan Password Anda" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="usertype">Pilih Level</label>
                
                    <select class="form-control" name="usertype" id="usertype">
                        <option value="">-- Pilih Level --</option>
                        <option value="administrator">administrator</option>
                        <option value="admin-pelatihan">admin-pelatihan</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                    <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>

@endsection
