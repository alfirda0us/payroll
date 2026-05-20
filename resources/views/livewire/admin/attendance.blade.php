<!-- resources/views/livewire/admin/attendance.blade.php -->
<div class="p-6 max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-semibold text-white">Attendance Management</h1>
            <p class="text-slate-400 mt-1">Monitor kehadiran semua karyawan</p>
        </div>
        
        <input type="date" wire:model.live='selectedDate' 
               class="bg-zinc-900 border border-zinc-700 rounded-2xl px-5 py-3 text-white focus:outline-none focus:border-emerald-500">
    </div>

    <!-- Quick Stats -->
    {{-- <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
        <div class="bg-zinc-900 border border-emerald-500/30 rounded-3xl p-6">
            <p class="text-slate-400 text-sm">Hadir Hari Ini</p>
            <p class="text-5xl font-bold text-white mt-3">{{ $presentCount ?? 0 }}</p>
        </div>
        <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-6">
            <p class="text-slate-400 text-sm">Izin</p>
            <p class="text-5xl font-bold text-white mt-3">{{ $permitCount ?? 0 }}</p>
        </div>
        <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-6">
            <p class="text-slate-400 text-sm">Sakit</p>
            <p class="text-5xl font-bold text-white mt-3">{{ $sickCount ?? 0 }}</p>
        </div>
        <div class="bg-zinc-900 border border-red-500/30 rounded-3xl p-6">
            <p class="text-slate-400 text-sm">Tidak Hadir</p>
            <p class="text-5xl font-bold text-white mt-3">{{ $absentCount ?? 0 }}</p>
        </div>
    </div> --}}

    <!-- Mark Attendance untuk Admin -->
    {{-- <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-8 mb-10">
        <h2 class="text-xl font-semibold text-white mb-6">Mark Attendance (Admin)</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">
        </div>
    </div> --}}

    <!-- Table -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-3xl overflow-hidden">
        <div class="p-6 border-b border-zinc-800">
            <h2 class="text-xl font-semibold text-white">Attendance Records</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-zinc-800">
                <thead class="bg-zinc-950">
                    <tr>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400">Nama Karyawan</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400">Tanggal</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400">Status</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800">
                    @forelse ($attendances as $item)
<tr class="hover:bg-zinc-800/50">

    <td class="px-6 py-5 font-medium text-white">
        {{ $item->user?->name ?? 'User Tidak Ditemukan' }}
    </td>

    <td class="px-6 py-5 text-slate-300">
        {{ $item->date }}
    </td>

    <td class="px-6 py-5">
        @if ($item->status == 'present')
            <span class="inline-flex px-4 py-1.5 rounded-2xl text-xs font-medium bg-emerald-500/20 text-emerald-400">
                ✅ Hadir
            </span>

        @elseif ($item->status == 'absent')
            <span class="inline-flex px-4 py-1.5 rounded-2xl text-xs font-medium bg-red-500/20 text-red-400">
                ❌ Tidak Hadir
            </span>

        @elseif ($item->status == 'sick')
            <span class="inline-flex px-4 py-1.5 rounded-2xl text-xs font-medium bg-orange-500/20 text-orange-400">
                🩹 Sakit
            </span>

        @elseif ($item->status == 'permit')
            <span class="inline-flex px-4 py-1.5 rounded-2xl text-xs font-medium bg-amber-500/20 text-amber-400">
                📋 Izin
            </span>
        @endif
    </td>

    <td class="px-6 py-5">
        <button 
            wire:click="delete({{ $item->id }})"
            onclick="return confirm('Yakin ingin menghapus data absensi ini?')"
            class="text-red-400 hover:text-red-500 font-medium">
            Hapus
        </button>
    </td>

</tr>

@empty
<tr>
    <td colspan="4" class="text-center py-12 text-slate-500">
        Belum ada riwayat absensi
    </td>
</tr>

@endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@livewireStyles()
@livewireScripts()