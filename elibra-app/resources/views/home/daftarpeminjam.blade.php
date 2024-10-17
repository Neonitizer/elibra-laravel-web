<x-layout>
@section('title', 'Daftar User')

<div class="container">
    <div class="content">
        <div class="list-container">
            <h1 class="mt-4 mb-4 text-white">DAFTAR PEMINJAM</h1>
            <div class="table-responsive">
                <table class="table table-striped table-warning">
                    <thead>
                        <tr>
                            <th scope="col">ID User</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Buku Terpinjam</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->iduser}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->jumlahbuku}}</td>
                            <td>
                                <a class="btn btn-danger" href="{{route('user_detail', ['iduser' => $user->iduser])}}">Detail User</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</x-layout>
