<x-layout>
@section('title', 'Home')

<div class="row">
    @if (session('accesslevel') == 'admin')
        <div class="col-md-3">
            <div class="content-item">
                <a href="{{ route('rules_page') }}" class="">
                    <div>
                        <img src="{{ asset('img/peraturan_img.png') }}" alt="" class="img-thumbnail rounded custom-bg-color" style="border: 10px solid #014515;" />
                    </div>
                </a>
                <div class="title text-white text-center">Peraturan</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="content-item">
                <a href="{{ route('book_list_page') }}" class="">
                    <div>
                        <img src="{{ asset('img/daftarbuku_img.png') }}" alt="" class="img-thumbnail rounded custom-bg-color" style="border: 10px solid #014515;" />
                    </div>
                </a>
                <div class="title text-white text-center">Daftar Buku</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="content-item">
                <a href="{{ route('borrower_list_page') }}" class="">
                    <div>
                        <img src="{{ asset('img/daftarpeminjam_img.png') }}" alt="" class="img-thumbnail rounded custom-bg-color" style="border: 10px solid #014515;" />
                    </div>
                </a>
                <div class="title text-white text-center">Daftar Peminjam</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="content-item">
                <a href="{{ route('add_book_page') }}" class="">
                    <div>
                        <img src="{{ asset('img/tambahbuku_img.png') }}" alt="" class="img-thumbnail rounded custom-bg-color" style="border: 10px solid #014515;" />
                    </div>
                </a>
                <div class="title text-white text-center">Tambah Buku</div>
            </div>
        </div>
    @else
        <div class="col-md-3">
            <div class="content-item">
                <a href="{{ route('rules_page') }}" class="">
                    <div>
                        <img src="{{ asset('img/peraturan_img.png') }}" alt="" class="img-thumbnail rounded custom-bg-color" style="border: 10px solid #014515;" />
                    </div>
                </a>
                <div class="title text-white text-center">Peraturan</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="content-item">
                <a href="{{ route('book_list_page') }}" class="">
                    <div>
                        <img src="{{ asset('img/daftarbuku_img.png') }}" alt="" class="img-thumbnail rounded custom-bg-color" style="border: 10px solid #014515;" />
                    </div>
                </a>
                <div class="title text-white text-center">Daftar Buku</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="content-item">
                <a href="{{ route('borrow_history_page') }}" class="">
                    <div>
                        <img src="{{ asset('img/history_img.png') }}" alt="" class="img-thumbnail rounded custom-bg-color" style="border: 10px solid #014515;" />
                    </div>
                </a>
                <div class="title text-white text-center">Riwayat Peminjaman</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="content-item">
                <a href="{{ route('borrow_status_page') }}" class="">
                    <div>
                        <img src="{{ asset('img/statuspeminjaman_img.png') }}" alt="" class="img-thumbnail rounded custom-bg-color" style="border: 10px solid #014515;" />
                    </div>
                </a>
                <div class="title text-white text-center">Status Peminjaman</div>
            </div>
        </div>
    @endif
</div>

</x-layout>
