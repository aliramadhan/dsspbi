@extends('layout.home')
@section('title')
Tambah User
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card card-body">
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama User</label>
                    <input type="text" name="nama_user" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email User</label>
                    <input type="text" name="email_user" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password User</label>
                    <input type="text" name="password_user" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="id_role" id="" class="form-control">
                        <option value="">Pilih</option>
                        <option value="1">Administrator</option>
                        <option value="2">User</option>
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
