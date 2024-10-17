<x-layout>
@section('title', 'Riwayat Peminjaman')

<div class="container">
    <div class="content">
        <div class="list-container">
            <h1 class="mt-4 mb-4 text-white">RIWAYAT PEMINJAMAN</h1>
            <div class="table-responsive">
                <table class="table table-striped table-warning">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">ID Buku</th>
                            <th scope="col">Nama Buku</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Genre Buku</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                        <tr>
                            <td>{{$book->tanggalpinjam}}</td>
                            <td>{{$book->idbuku}}</td>
                            <td>{{$book->namabuku}}</td>
                            <td>{{$book->pengarang}}</td>
                            <td>{{$book->genrebuku}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</x-layout>