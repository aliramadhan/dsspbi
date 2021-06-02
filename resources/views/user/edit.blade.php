@extends('layout.home')
@section('title')
Edit User
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card card-body">
            <form action="{{ route('user.update', [Crypt::encrypt($data->id_user)]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Nama User</label>
                    <input type="text" name="nama_user" id="" class="form-control" value="{{ $data->nama_user }}">
                </div>
                <div class="form-group">
                    <label for="">Email User</label>
                    <input type="text" name="email_user" id="" class="form-control" value="{{ $data->email_user }}">
                </div>
                <div class="form-group">
                    <label for="">Password User</label>
                    <input type="text" name="password_user" id="" class="form-control" value="{{ $data->password_user }}">
                </div>
                <div class="form-group">
                    <label for="">Role User</label>
                    <select name="id_role" id="" class="form-control">
                        <option value="1">Pilih</option>
                        <option value="1" {{ $data->id_role == '1' ? 'selected' : '' }}>Administrator</option>
                        <option value="2" {{ $data->id_role == '2' ? 'selected' : '' }}>User</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
