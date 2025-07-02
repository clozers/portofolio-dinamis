@extends('admin.v_layouts.app')

@section('section-admin')
    <div class="row">
        <!-- Full Width -->
        <section class="col-12">
            <div class="card bg-white">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="fas fa-user-shield"></i>
                        Selamat Datang, {{ Auth::user()->name }}!
                    </h3>
                    <hr>
                </div>
                <div class="card-body">
                    <p class="mb-3" style="font-size: 18px;">
                        Anda berhasil login sebagai <strong>{{ Auth::user()->name }}</strong>.
                        Silakan kelola data, memonitor transaksi, serta mengatur seluruh aktivitas sistem
                        dengan mudah melalui menu navigasi yang telah disediakan.
                        Pastikan Anda rutin melakukan pengecekan data dan pembaruan informasi untuk
                        menjaga kinerja sistem tetap optimal.
                    </p>
                </div>
            </div>
        </section>
    </div>
@endsection
