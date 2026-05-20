<div class="p-6 max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-semibold text-white">Employee Management</h1>
            <p class="text-slate-400 mt-1">Manage employees and their salary data</p>
        </div>
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
            {{ $editCheck ? 'Edit Employee' : 'Add New Employee' }}
        </h2>

        <form class="grid grid-cols-1 md:grid-cols-3 gap-6" wire:submit.prevent='store'>
            
            <!-- User -->
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">User</label>
                <select wire:model='user_id' 
                        class="w-full bg-zinc-800 border border-zinc-700 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-emerald-500 transition-colors">
                    <option value="">--- Select User ---</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Position -->
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Position</label>
                <select wire:model='position_id' 
                        class="w-full bg-zinc-800 border border-zinc-700 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-emerald-500 transition-colors">
                    <option value="">--- Select Position ---</option>
                    @foreach ($positions as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Salary -->
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Monthly Salary (Rp)</label>
                <input 
                    wire:model='salary'
                    type="number" 
                    placeholder="e.g. 8500000"
                    class="w-full bg-zinc-800 border border-zinc-700 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-emerald-500 transition-colors"
                >
            </div>

            <!-- Submit Button -->
            <div class="md:col-span-3 flex gap-4 pt-4">
                @if ($editCheck == false)
                    <button 
                        type="submit"
                        class="bg-emerald-500 hover:bg-emerald-600 transition-all px-8 py-4 rounded-2xl font-semibold text-white flex items-center gap-2">
                        <span>Save Employee</span>
                    </button>
                @endif
            </div>
        </form>

        @if ($editCheck == true)
            <div class="flex gap-4 mt-6">
                <button 
                    wire:click='update({{ $idEdit }})'
                    class="bg-violet-500 hover:bg-violet-600 transition-all px-8 py-4 rounded-2xl font-semibold text-white">
                    Update Employee
                </button>
                <button 
                    wire:click='clear'
                    class="bg-zinc-700 hover:bg-zinc-600 transition-all px-6 py-4 rounded-2xl font-semibold text-slate-300">
                    Cancel
                </button>
            </div>
        @endif
    </div>

    <!-- Table -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-3xl overflow-hidden">
        <div class="p-6 border-b border-zinc-800">
            <h2 class="text-xl font-semibold text-white">Employee List</h2>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-zinc-800">
                <thead class="bg-zinc-950">
                    <tr>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">#</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">Employee</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">Position</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">Salary</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800">
                    @foreach ($employees as $item)
                    <tr class="hover:bg-zinc-800/50 transition-colors">
                        <td class="px-6 py-5 whitespace-nowrap text-slate-400">{{ $loop->iteration }}</td>
                        <td class="px-6 py-5 whitespace-nowrap font-medium text-white">{{ $item->user->name }}</td>
                        <td class="px-6 py-5 whitespace-nowrap text-slate-300">{{ $item->position->name }}</td>
                        <td class="px-6 py-5 whitespace-nowrap text-emerald-400 font-medium">
                            Rp. {{ number_format($item->salary) }}
                        </td>
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