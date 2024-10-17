<x-layout>
@section('title', 'Daftar Buku')

<div class="container">
    <div class="content">
        <div class="list-container">
            <h1 class="mt-4 mb-4 text-white">DAFTAR BUKU</h1>
            <div class="table-responsive">
                <table class="table table-striped table-warning">
                    <thead>
                        <tr>
                            <th scope="col">Nama Buku</th>
                            <th scope="col">ID Buku</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Genre Buku</th>
                            <th scope="col">Selengkapnya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                        <tr>
                            <td>{{$book->namabuku}}</td>
                            <td>{{$book->idbuku}}</td>
                            <td>{{$book->pengarang}}</td>
                            <td>{{$book->genrebuku}}</td>
                            <td><a href="{{ route('book_page', ['idbuku' => $book->idbuku]) }}" class="btn btn-success">Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</x-layout>
