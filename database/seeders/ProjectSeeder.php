<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama agar bersih
        Project::truncate();

        Project::create([
            'title' => 'Web App Dashboard Monitoring Internet of Things (IoT)',
            'description' => 'Dashboard monitoring berbasis web untuk sistem deteksi kebocoran gas dan api berbasis IoT (ESP32, sensor MQ-2, dan flame sensor). Menampilkan data sensor secara real-time, status sistem (aman/bahaya), serta riwayat data. ESP32 mengirimkan data menggunakan protokol HTTP ke REST API Laravel.',
            'screenshot' => null,
            'github_link' => 'https://github.com/clozers',
            'tgl_upload' => '2026-06-01',
        ]);

        Project::create([
            'title' => 'Aplikasi Mobile Programming SPENDKU',
            'description' => 'Aplikasi mobile pencatatan dan pengelolaan keuangan pribadi. Menyediakan pencatatan manual maupun otomatis melalui pemindaian (scan) struk belanja berbasis OCR, pengelompokan kategori, riwayat transaksi, dan analisis pengeluaran. Fokus peran saya pada pengembangan Backend & REST API menggunakan Laravel.',
            'screenshot' => null,
            'github_link' => 'https://github.com/clozers',
            'tgl_upload' => '2025-10-01',
        ]);

        Project::create([
            'title' => 'Web App E-Commerce Sederhana',
            'description' => 'Aplikasi e-commerce berbasis Laravel dengan alur belanja komprehensif dari penelusuran produk hingga pembayaran. Dilengkapi manajemen inventaris, pemrosesan pesanan, dan integrasi API RajaOngkir, Midtrans, serta Google Auth.',
            'screenshot' => null,
            'github_link' => 'https://github.com/clozers',
            'tgl_upload' => '2025-06-01',
        ]);

        Project::create([
            'title' => 'Web App Sistem Manajemen Produk dan Transaksi Apotek',
            'description' => 'Aplikasi manajemen apotek berbasis Laravel untuk membantu pengelolaan stok obat, transaksi penjualan/pembelian secara praktis. Terintegrasi dengan payment gateway Midtrans, Google Auth, serta dilengkapi Landing Page User dan Halaman Admin.',
            'screenshot' => null,
            'github_link' => 'https://github.com/clozers',
            'tgl_upload' => '2025-06-15',
        ]);

        Project::create([
            'title' => 'Web App untuk Rental Mobil Sederhana',
            'description' => 'Aplikasi manajemen rental mobil berbasis Laravel untuk tugas akhir semester. Mempermudah pengelolaan proses penyewaan kendaraan, mulai dari pencatatan data armada, transaksi penyewaan, hingga pengembalian mobil secara digital.',
            'screenshot' => null,
            'github_link' => 'https://github.com/clozers',
            'tgl_upload' => '2024-12-01',
        ]);

        Project::create([
            'title' => 'Web App untuk Manajemen Catatan Perjalanan',
            'description' => 'Aplikasi web berbasis Laravel yang dirancang untuk mencatat dan mengelola riwayat perjalanan pengguna secara efisien. Menyediakan fitur registrasi, login, dokumentasi aktivitas perjalanan, dan pemantauan data perjalanan terintegrasi.',
            'screenshot' => null,
            'github_link' => 'https://github.com/clozers',
            'tgl_upload' => '2023-07-01',
        ]);
    }
}
