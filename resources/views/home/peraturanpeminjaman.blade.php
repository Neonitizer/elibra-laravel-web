<x-layout>
@section('title', 'Peraturan Peminjaman')

    <div class="container mt-5">
        <h1 class="text-center mb-4 text-white">Peraturan Perpustakaan</h1>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Peraturan Peminjaman Buku</h2>
                <ul>
                    <li>Peminjaman tidak dapat dilakukan apabila anggota memiliki 5 pinjaman buku.</li>
                    <li>Peminjaman buku hanya akan diproses oleh staff perpustakaan setelah tombol checkout pada menu status peminjaman ditekan.</li>
                    <li>Pengambilan dapat dilakukan mandiri oleh mahasiswa.</li>
                    <li>Batas waktu peminjaman adalah 14 hari sebelum harus dikembalikan.</li>
                    <li>Peminjaman buku di atas pukul 17.00 WIB dan di luar jam kerja akan diproses pada hari kerja berikutnya.</li>
                    <li>Apabila buku yang dipinjam mengalami kehilangan, maka mahasiswa yang bersangkutan akan dikenai denda sejumlah nilai buku yang hilang.</li>
                </ul>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h2 class="card-title">Peraturan Pengembalian Buku</h2>
                <ul>
                    <li>Pengembalian buku dapat dilakukan melalui staff perpustakaan.</li>
                    <li>Pengembalian buku di atas pukul 17.00 WIB dan di luar jam kerja akan diproses pada hari kerja berikutnya.</li>
                    <li>Jika pengembalian tidak dilakukan, mahasiswa yang terkait akan dihubungi oleh pihak staff perpustakaan.</li>
                </ul>
            </div>
        </div>
    </div>

</x-layout>