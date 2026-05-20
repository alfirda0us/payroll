<div class="p-6 max-w-7xl mx-auto">
    <div class="flex justify-between items-end mb-8">
        <div>
            <h1 class="text-3xl font-semibold text-white">Payroll Management</h1>
            <p class="text-slate-400 mt-1">Process and manage employee payments</p>
        </div>
        
        <input 
            type="text" 
            placeholder="Search employee..." 
            wire:model.live='keyword'
            class="bg-zinc-900 border border-zinc-700 focus:border-emerald-500 rounded-2xl px-5 py-3 w-80 text-white placeholder:text-slate-500 focus:outline-none transition-colors"
        >
    </div>

    @if ($errors->any())
        <div class="mb-6 bg-red-500/10 border border-red-500/30 rounded-2xl p-4">
            @foreach ($errors->all() as $error)
                <p class="text-red-400 text-sm">• {{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if (session('message'))
        <div class="mb-6 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-2xl px-5 py-4 font-medium">
            {{ session('message') }}
        </div>
    @endif

    <!-- Form Card -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-8 mb-10">
        <h2 class="text-xl font-semibold text-white mb-6">
            {{ $editCheck ? 'Edit Payroll' : 'Create New Payroll' }}
        </h2>

        <form class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" wire:submit.prevent='store'>
            
            <!-- Employee -->
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Employee</label>
                <select wire:model='employee_id' 
                        class="w-full bg-zinc-800 border border-zinc-700 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-emerald-500 transition-colors">
                    <option value="">--- Select Employee ---</option>
                    @foreach ($employees as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Period -->
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Period (Month/Year)</label>
                <input 
                    type="date" 
                    wire:model='period'
                    class="w-full bg-zinc-800 border border-zinc-700 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-emerald-500 transition-colors"
                >
            </div>

            <!-- Allowance -->
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Allowance (Rp)</label>
                <input 
                    type="number" 
                    wire:model='allowance'
                    placeholder="0"
                    class="w-full bg-zinc-800 border border-zinc-700 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-emerald-500 transition-colors"
                >
            </div>

            <!-- Deduction -->
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Deduction (Rp)</label>
                <input 
                    type="number" 
                    wire:model='deduction'
                    placeholder="0"
                    class="w-full bg-zinc-800 border border-zinc-700 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-emerald-500 transition-colors"
                >
            </div>

            <!-- Submit Button -->
            <div class="lg:col-span-4 flex gap-4 pt-4">
                @if ($editCheck == false)
                    <button 
                        type="submit"
                        class="bg-emerald-500 hover:bg-emerald-600 transition-all px-8 py-4 rounded-2xl font-semibold text-white flex items-center gap-2">
                        Save Payroll
                    </button>
                @endif
            </div>
        </form>

        @if ($editCheck == true)
            <div class="flex gap-4 mt-6">
                <button 
                    wire:click='update({{ $idEdit }})'
                    class="bg-violet-500 hover:bg-violet-600 transition-all px-8 py-4 rounded-2xl font-semibold text-white">
                    Update Payroll
                </button>
                <button 
                    wire:click='clear'
                    class="bg-zinc-700 hover:bg-zinc-600 transition-all px-6 py-4 rounded-2xl font-semibold text-slate-300">
                    Cancel
                </button>
            </div>
        @endif
    </div>

    <!-- Payroll Table -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-3xl overflow-hidden">
        <div class="p-6 border-b border-zinc-800 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-white">Payroll Records</h2>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-zinc-800">
                <thead class="bg-zinc-950">
                    <tr>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">#</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">Employee</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">Period</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">Base Salary</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">Allowance</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">Deduction</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">Net Salary</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800">
                    @foreach ($payrolls as $item)
                    <tr class="hover:bg-zinc-800/50 transition-colors">
                        <td class="px-6 py-5 whitespace-nowrap text-slate-400">{{ $loop->iteration }}</td>
                        <td class="px-6 py-5 whitespace-nowrap font-medium text-white">{{ $item->employee->user->name }}</td>
                        <td class="px-6 py-5 whitespace-nowrap text-slate-300">{{ $item->period }}</td>
                        <td class="px-6 py-5 whitespace-nowrap text-emerald-400">Rp. {{ number_format($item->employee->salary ?? 0) }}</td>
                        <td class="px-6 py-5 whitespace-nowrap text-emerald-400">Rp. {{ number_format($item->allowance) }}</td>
                        <td class="px-6 py-5 whitespace-nowrap text-red-400">Rp. {{ number_format($item->deduction) }}</td>
                        <td class="px-6 py-5 whitespace-nowrap font-semibold text-white">Rp. {{ number_format($item->net_salary) }}</td>
                        <td class="px-6 py-5 whitespace-nowrap">
                            <div class="flex gap-3">
                                @if ($editCheck == false)
                                    <button 
                                        wire:click='edit({{ $item->id }})'
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2.5 rounded-2xl text-sm font-medium transition-all">
                                        Edit
                                    </button>
                                @endif
                                
                                <button 
                                    wire:click='destroy({{ $item->id }})'
                                    class="bg-red-500 hover:bg-red-600 text-white px-5 py-2.5 rounded-2xl text-sm font-medium transition-all">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($editCheck == true)
            <div class="p-6 border-t border-zinc-800 bg-zinc-950">
                <button 
                    wire:click='clear'
                    class="text-slate-400 hover:text-white transition-colors">
                    ← Cancel Editing
                </button>
            </div>
        @endif
    </div>
</div>