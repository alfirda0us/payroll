<?php

namespace App\Livewire\Admin;

use App\Models\Employee;
use App\Models\Payroll as ModelsPayroll;
use Livewire\Component;

class Payroll extends Component
{

    public $editCheck = false;
    public $idEdit;
    public $employee_id;
    public $period;
    public $allowance;
    public $deduction;

    public function render()
    {
        $employees = Employee::all(); 
        $payrolls = ModelsPayroll::all();
        return view('livewire.admin.payroll', compact('payrolls','employees'));
    }

    public function store(){
        $validate = $this->validate([
           'employee_id'=>'required',
           'period'=>'required',
           'allowance'=>'required',
           'deduction'=>'required' 
        ]);

        $employee = Employee::find($this->employee_id);
        ModelsPayroll::create([
            'employee_id'=> $this->employee_id,
            'period'=>$this->period,
            'allowance'=> $this->allowance,
            'deduction'=> $this->deduction,
            'net_salary' => $employee->salary + $this->allowance - $this->deduction
        ]);
        session()->flash('message','Berhasil menambah payroll');
    }

    public function destroy($id){
        $payroll = ModelsPayroll::find($id);
        $payroll->delete();
        session()->flash('message','data berhasil dihapu s');
    }

    public function edit($id){
        $payroll = ModelsPayroll::find($id);
        $this->idEdit = $payroll->id;
        $this->employee_id = $payroll->employee_id;
        $this->allowance = $payroll->allowance;
        $this->deduction = $payroll->deduction;
        $this->period = $payroll->period;
        $this->editCheck = true;
    }

    public function clear(){
        $this->idEdit = '';
        $this->employee_id = '';
        $this->allowance ='';
        $this->deduction = '';
        $this->period = '';
        $this->editCheck = false;
    }
    
    public function update($id){
        $payroll = ModelsPayroll::find($id);

        $this->validate([
            'employee_id'=>'required',
            'period'=>'required',
            'allowance'=>'required',
            'deduction'=>'required'
        ]);

        $employee = Employee::find($this->employee_id);
        $payroll->update([
            'employe_id'=> $this->employee_id,
            'period'=>$this->period,
            'allowance'=> $this->allowance,
            'deduction'=> $this->deduction,
            'net_salary'=> $employee->salary + $this->allowance - $this->deduction
        ]);
        session()->flash('message','berhasil update data');
        $this->clear();
    }
}  
