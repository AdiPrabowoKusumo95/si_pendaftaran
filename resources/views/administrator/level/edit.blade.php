@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">{{ $title }}</div>
        <form action="{{route('admin.level.update', $edit->id)}}" method="post">
            <div class="card-body">
                @csrf
                @method("PUT")
                <div class="form-group mb-3">
                    <label for="">Nama</label>
                    <input value="{{$edit->name}}" type="text" name="name" placeholder="Masukkan Nama Lengkap Anda" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input value="{{$edit->email}}" type="email" name="email" placeholder="Masukkan Email Anda" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Password )* Boleh kosong jika tidak ingin mengganti password</label>
                    <input value="{{$edit->password}}" type="password" name="password" placeholder="Masukkan Password Anda" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                    <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>

@endsection
