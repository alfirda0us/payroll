{{-- Main Admin Dashboard (design-first, non-empty) --}}
@extends('layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-semibold text-white">Admin Dashboard</h1>
                <p class="text-slate-400 mt-2">Ringkasan singkat & navigasi cepat untuk mengelola sistem payroll.</p>
            </div>
            <div class="flex gap-3">
                <a href="/employee" class="bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 hover:bg-emerald-500/25 transition-colors px-5 py-3 rounded-2xl font-medium">
                    Kelola Pegawai
                </a>
                <a href="/payroll" class="bg-violet-500/20 border border-violet-500/30 text-violet-300 hover:bg-violet-500/25 transition-colors px-5 py-3 rounded-2xl font-medium">
                    Kelola Payroll
                </a>
            </div>
        </div>

        {{-- Stat Cards (text-first / no DB required) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-6">
                <p class="text-slate-400 text-sm">Modul</p>
                <p class="text-2xl font-semibold text-white mt-2">Pegawai</p>
                <p class="text-slate-400 text-sm mt-2">Tambah, edit, dan hapus data karyawan.</p>
            </div>
            <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-6">
                <p class="text-slate-400 text-sm">Modul</p>
                <p class="text-2xl font-semibold text-white mt-2">Jabatan</p>
                <p class="text-slate-400 text-sm mt-2">Atur daftar posisi untuk karyawan.</p>
            </div>
            <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-6">
                <p class="text-slate-400 text-sm">Modul</p>
                <p class="text-2xl font-semibold text-white mt-2">Pengguna</p>
                <p class="text-slate-400 text-sm mt-2">Kelola akun & role akses sistem.</p>
            </div>
            <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-6">
                <p class="text-slate-400 text-sm">Modul</p>
                <p class="text-2xl font-semibold text-white mt-2">Absensi</p>
                <p class="text-slate-400 text-sm mt-2">Lihat dan kelola riwayat kehadiran.</p>
            </div>
        </div>

        {{-- Quick Actions + Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <div class="lg:col-span-2 bg-zinc-900 border border-zinc-800 rounded-3xl p-6">
                <h2 class="text-xl font-semibold text-white">Quick Actions</h2>
                <p class="text-slate-400 mt-1">Pilih menu yang ingin kamu kelola sekarang.</p>

                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <a href="/admin/attendance" class="group flex items-center justify-between gap-4 bg-zinc-950 border border-zinc-800 rounded-2xl px-5 py-4 hover:border-emerald-500/40 hover:bg-zinc-900/40 transition-colors">
                        <div>
                            <p class="text-white font-medium group-hover:text-emerald-300 transition-colors">Attendance</p>
                            <p class="text-slate-400 text-sm">Riwayat absensi karyawan</p>
                        </div>
                        <span class="text-emerald-400">→</span>
                    </a>

                    <a href="/employee" class="group flex items-center justify-between gap-4 bg-zinc-950 border border-zinc-800 rounded-2xl px-5 py-4 hover:border-emerald-500/40 hover:bg-zinc-900/40 transition-colors">
                        <div>
                            <p class="text-white font-medium group-hover:text-emerald-300 transition-colors">Employees</p>
                            <p class="text-slate-400 text-sm">Data pegawai & salary</p>
                        </div>
                        <span class="text-emerald-400">→</span>
                    </a>

                    <a href="/position" class="group flex items-center justify-between gap-4 bg-zinc-950 border border-zinc-800 rounded-2xl px-5 py-4 hover:border-emerald-500/40 hover:bg-zinc-900/40 transition-colors">
                        <div>
                            <p class="text-white font-medium group-hover:text-emerald-300 transition-colors">Positions</p>
                            <p class="text-slate-400 text-sm">Daftar jabatan</p>
                        </div>
                        <span class="text-emerald-400">→</span>
                    </a>

                    <a href="/user" class="group flex items-center justify-between gap-4 bg-zinc-950 border border-zinc-800 rounded-2xl px-5 py-4 hover:border-emerald-500/40 hover:bg-zinc-900/40 transition-colors">
                        <div>
                            <p class="text-white font-medium group-hover:text-emerald-300 transition-colors">Users</p>
                            <p class="text-slate-400 text-sm">Akun admin & user</p>
                        </div>
                        <span class="text-emerald-400">→</span>
                    </a>

                    <a href="/payroll" class="group flex items-center justify-between gap-4 bg-zinc-950 border border-zinc-800 rounded-2xl px-5 py-4 hover:border-violet-500/40 hover:bg-zinc-900/40 transition-colors sm:col-span-2">
                        <div>
                            <p class="text-white font-medium group-hover:text-violet-300 transition-colors">Payroll</p>
                            <p class="text-slate-400 text-sm">Proses pembayaran & perhitungan</p>
                        </div>
                        <span class="text-violet-300">→</span>
                    </a>
                </div>
            </div>

            <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-6">
                <h2 class="text-xl font-semibold text-white">System Status</h2>
                <p class="text-slate-400 mt-1">Catatan singkat untuk admin.</p>

                <div class="mt-6 space-y-4">
                    <div class="bg-zinc-950 border border-zinc-800 rounded-2xl px-5 py-4">
                        <p class="text-slate-400 text-sm">Fokus hari ini</p>
                        <p class="text-white font-medium mt-1">Lengkapi data pegawai & jabatan terlebih dahulu</p>
                        <p class="text-slate-400 text-sm mt-2">Setelah itu baru proses payroll dan cek absensi.</p>
                    </div>
                    <div class="bg-zinc-950 border border-zinc-800 rounded-2xl px-5 py-4">
                        <p class="text-slate-400 text-sm">Tips</p>
                        <p class="text-white font-medium mt-1">Gunakan menu “Quick Actions”</p>
                        <p class="text-slate-400 text-sm mt-2">Biarkan dashboard jadi titik mulai yang cepat.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Recent section (word-only) --}}
        <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h2 class="text-xl font-semibold text-white">Recent Overview</h2>
                    <p class="text-slate-400 mt-1">Area ringkasan aktivitas terbaru (placeholder design).</p>
                </div>
                <span class="text-slate-500 text-sm">Belum ada log aktivitas terhubung (design-only).</span>
            </div>

            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-zinc-950 border border-zinc-800 rounded-2xl p-5">
                    <p class="text-slate-400 text-sm">Payroll</p>
                    <p class="text-white font-medium mt-2">Siap diproses</p>
                    <p class="text-slate-400 text-sm mt-1">Buka menu Payroll untuk buat/ubah data.</p>
                </div>
                <div class="bg-zinc-950 border border-zinc-800 rounded-2xl p-5">
                    <p class="text-slate-400 text-sm">Attendance</p>
                    <p class="text-white font-medium mt-2">Siap dicek</p>
                    <p class="text-slate-400 text-sm mt-1">Cek riwayat absensi dari menu Attendance.</p>
                </div>
                <div class="bg-zinc-950 border border-zinc-800 rounded-2xl p-5">
                    <p class="text-slate-400 text-sm">Master Data</p>
                    <p class="text-white font-medium mt-2">Pegawai & posisi</p>
                    <p class="text-slate-400 text-sm mt-1">Pastikan data master sudah lengkap.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

