<div class="p-6 max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-semibold text-white">My Attendance</h1>
        <p class="text-slate-400">Catat kehadiran Anda hari ini</p>
    </div>

    @if (session('message'))
        <div class="mb-6 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-2xl px-5 py-4 font-medium">
            {{ session('message') }}
        </div>
    @endif

    <!-- Form Absensi -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-8 mb-10">
        <h2 class="text-xl font-semibold text-white mb-6">Absensi Hari Ini</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Status Kehadiran</label>
                <select wire:model='status' 
                        class="w-full bg-zinc-800 border border-zinc-700 rounded-2xl px-5 py-4 text-white focus:border-emerald-500">
                    <option value="">--- Pilih Status ---</option>
                    <option value="present">✅ Hadir</option>
                    <option value="sick">🩹 Sakit</option>
                    <option value="permit">📋 Izin</option>
                    <option value="absent">❌ Tidak Hadir</option>
                </select>
                <button wire:click='save' class="mt-6 w-full bg-emerald-500 hover:bg-emerald-600 text-white font-medium py-3 rounded-2xl transition-colors">Submit</button>
            </div>
        </div>
    </div>

    <!-- Riwayat Absensi -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-3xl overflow-hidden">
        <div class="p-6 border-b border-zinc-800">
            <h2 class="text-xl font-semibold text-white">Riwayat Absensi Saya</h2>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-zinc-800">
                <thead class="bg-zinc-950">
                    <tr>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400">Tanggal</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800">
                    @forelse ($attendances as $item)
                    <tr class="hover:bg-zinc-800/50">
                        <td class="px-6 py-5 text-slate-300">{{ $item->date }}</td>
                        <td class="px-6 py-5">
                            @if ($item->status == 'present')
                                <span class="inline-flex px-4 py-1.5 rounded-2xl text-xs font-medium bg-emerald-500/20 text-emerald-400">✅ Hadir</span>
                            @elseif ($item->status == 'absent')
                                <span class="inline-flex px-4 py-1.5 rounded-2xl text-xs font-medium bg-red-500/20 text-red-400">❌ Tidak Hadir</span>
                            @elseif ($item->status == 'sick')
                                <span class="inline-flex px-4 py-1.5 rounded-2xl text-xs font-medium bg-orange-500/20 text-orange-400">🩹 Sakit</span>
                            @elseif ($item->status == 'permit')
                                <span class="inline-flex px-4 py-1.5 rounded-2xl text-xs font-medium bg-amber-500/20 text-amber-400">📋 Izin</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-center py-12 text-slate-500">
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