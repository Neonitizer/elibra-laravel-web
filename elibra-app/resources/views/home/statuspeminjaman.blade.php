<x-layout>
@section('title', 'Status Peminjaman')

<div class="container">
    <div class="content">
        <div class="list-container">
            <h1 class="mt-4 mb-4 text-white">DAFTAR BUKU ANDA</h1>
            <div class="table-responsive">
                <table class="table table-striped table-warning">
                    <thead>
                        <tr>
                            <th scope="col">ID Buku</th>
                            <th scope="col">Nama Buku</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userbook as $book)
                        @if($book->kembali == 0)
                        <tr>
                            <td>{{$book->idbuku}}</td>
                            <td>{{$book->namabuku}}</td>
                            <td>{{$book->pengarang}}</td>
                            <td>{{$book->genrebuku}}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('book_page', ['idbuku' => $book->idbuku])}}">Detail Buku</a>
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

</x-layout>
