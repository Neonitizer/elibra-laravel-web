<x-layout>
@section('title', 'Detail Buku')
    <div class="content">
        <div class="list-container text-white">
            <h1 class="mt-4 mb-4">DETAIL BUKU</h1>
            <div class="card">
                <div class="card-body">
                    @if (session()->has('flash'))
                        <p class="alert alert-danger mt-3">{{ session('flash') }}</p>
                    @endif
                    <h2>{{ $book->namabuku }}</h2>
                    <p><strong>ID Buku:</strong> {{ $book->idbuku }}</p>
                    <p><strong>Pengarang:</strong> {{ $book->pengarang }}</p>
                    <p><strong>Genre Buku:</strong> {{ $book->genrebuku }}</p>
                    <p class="overflow-hidden" style="max-height: 200px;"><strong>Ringkasan:</strong> {{ $book->ringkasan }}</p>
                </div>
                @if (session('accesslevel') != 'admin')
                <div class="mt-2 mb-5 mx-3">
                    <p class="text-info">Peminjaman dapat diverifikasi pada Tab Status Peminjaman.</p>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmModal">Pinjam</button>
                </div>
                @else
                <div class="mt-2 mb-5 mx-3">
                    <p class="text-danger">Hapus data buku?</p>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">Hapus</button>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @if (session('accesslevel') == 'user')
                <div class="modal-body">
                    Dengan menekan konfirmasi, anda menyatakan bahwa anda akan meminjam buku ini. Apakah Anda yakin ingin melanjutkan tindakan ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="{{ route('choose_book_process', ['idbuku' => $book->idbuku]) }}" class="btn btn-success">Konfirmasi</a>
                </div>
                @else
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus buku ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="{{ route('delete_book_process', ['idbuku' => $book->idbuku]) }}" class="btn btn-success">Konfirmasi</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
