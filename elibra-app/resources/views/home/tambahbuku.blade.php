<x-layout>
    @section('title', 'Tambah Buku')
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">TAMBAH BUKU</h1>
                    @if (session()->has('flash'))
                        <p class="alert alert-danger">{{ session('flash') }}</p>
                    @endif
                    <form action="{{ route('add_book_process') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="idbuku" class="col-sm-2 col-form-label">ID Buku</label>
                            <div class="col-sm-10">
                                <input type="text" name="idbuku" id="idbuku" class="form-control" maxlength="10">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="namabuku" class="col-sm-2 col-form-label">Nama Buku</label>
                            <div class="col-sm-10">
                                <input type="text" name="namabuku" id="namabuku" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                            <div class="col-sm-10">
                                <input type="text" name="pengarang" id="pengarang" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="genrebuku" class="col-sm-2 col-form-label">Genre Buku</label>
                            <div class="col-sm-10">
                                <input type="text" name="genrebuku" id="genrebuku" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="genrebuku" class="col-sm-2 col-form-label">Jumlah Buku</label>
                            <div class="col-sm-10">
                                <input type="number" name="tersediabuku" id="tersediabuku" class="form-control" min="0" max="999">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="ringkasan" class="col-sm-2 col-form-label">Ringkasan Buku</label>
                            <div class="col-sm-10">
                                <textarea name="ringkasan" id="ringkasan" class="form-control" rows="8" maxlength="499"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-layout>
