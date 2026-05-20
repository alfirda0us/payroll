<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Attendance extends Component
{
    public function render()
    {
        $attendances = \App\Models\Attendance::with('user')->get();
        return view('livewire.admin.attendance', compact('attendances'));
    }

public function delete($id)
{
    $attendance = \App\Models\Attendance::find($id);   // Pakai full namespace

    if ($attendance) {
        $attendance->delete();
        session()->flash('message', 'Data absensi berhasil dihapus.');
    } else {
        session()->flash('error', 'Data absensi tidak ditemukan.');
    }
}
public function user()
{
    return $this->belongsTo(User::class);
}

}
