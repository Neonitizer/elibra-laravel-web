<x-layout>
@section('title', 'Detail Peminjam')
    <div class="content">
        <div class="list-container text-white">
            <h1 class="mt-4 mb-4">DETAIL USER</h1>
            <div class="card">
                <div class="card-body">
                    @if (session()->has('flash'))
                        <p class="alert alert-danger mt-3">{{ session('flash') }}</p>
                    @endif
                    <img src="https://via.placeholder.com/400x550" alt="Profile Image" class="img-fluid mx-auto rounded d-block mb-4">
                    <h2>{{ $user->username }}</h2>
                    <p><strong>ID User:</strong> {{ $user->iduser }}</p>
                    <p><strong>Jumlah Buku Terpinjam:</strong> {{ $user->jumlahbuku }}</p>
                    <h3 class="mt-3">Buku Terpinjam:</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-warning">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Buku</th>
                                    <th scope="col">ID Buku</th>
                                    <th scope="col">Tanggal Peminjaman</th>
                                    <th scope="col">Lepas Buku</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                @if($book->kembali == 0)
                                <tr>
                                    <td>{{$book->namabuku}}</td>
                                    <td>{{$book->idbuku}}</td>
                                    <td>{{$book->tanggalpinjam}}</td>
                                    <td>
                                        <a href="{{ route('user_book_remove', ['iduser' => $user->iduser, 'kodepinjam' => $book->kodepinjam])}}" class="btn btn-success">Lepas</a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
