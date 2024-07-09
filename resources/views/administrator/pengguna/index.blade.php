@extends('layouts2.app')
@section('content')
    <div class="card">
        <div class="card-header">User</div>
        <div class="card-body">
            <div align="right" class="mb-3">
                <a href="{{ route('administrator.pengguna.create') }}" class="btn btn-primary">Tambah User</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach ($datas as $data)
                        <tr>

                            <td>{{ $no++ }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                              <a href="{{route('administrator.pengguna.show', $data->id)}}" class="btn btn-success btn-sm">Edit</a> |

                              <form method="POST" action="{{route('administrator.pengguna.destroy', $data->id)}}" class="d-inline">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                            </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
