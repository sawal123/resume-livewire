<?php

namespace App\Livewire\Experience;

use App\Models\Pengalaman as ModelsPengalaman;
use Livewire\Component;

class Pengalaman extends Component
{
    public $modal = false;
    public $check = '';
    public $name = '';
    public $posisi = '';
    public $start = '';
    public $end = '';
    public $disabled = '';

    public $titleModal = '';
    public $submitModal = '';


    public $delModal = false;
    public $uuid;

    public function res()
    {
        $this->check = '';
        $this->name = '';
        $this->posisi = '';
        $this->start = '';
        $this->end = '';
        $this->disabled = '';
    }

    public function confirmDelete($uuid)
    {
        $this->delModal = true;
        $this->uuid = $uuid;
    }
    public function cancelDel()
    {
        $this->delModal = false;
    }


    public function openModal()
    {
        $this->modal = true;
        $this->titleModal = 'Tambah Data Pengalaman';
        $this->submitModal = 'save';
        // dd('tes');
    }
    public function closeModal()
    {
        $this->modal = false;
        $this->res();
    }

    public function save()
    {
        $this->validate([
            'name' => 'string|required|max:255',
            'posisi' => 'string'
        ]);
        $ex = new ModelsPengalaman();

        $ex->perusahaan = $this->name;
        $ex->job = $this->posisi;
        $ex->start = $this->start;
        $ex->end  = $this->end === '' ? 'Sekarang' : $this->end;
        session()->flash('message', 'Experience successfully saved.');
        $ex->save();
        $this->closeModal();
        $this->res();
    }
    public function delete($uuid)
    {
        // Logika penghapusan Anda di sini
        $del = ModelsPengalaman::where('id', $uuid)->firstOrFail();
        $del->delete();
        $this->cancelDel();
        session()->flash('message', 'Item deleted successfully.');
    }


    public $uPro;
    public $ePro;
    public function editModal($uuid)
    {
        $this->uPro = $uuid;
        $this->titleModal = 'Edit Data Pengalaman';
        $this->submitModal = 'edit';
        $this->modal = true;
        $this->ePro = ModelsPengalaman::where('id', $uuid)->firstOrFail();
        $this->name =  $this->ePro->perusahaan;
        $this->posisi =  $this->ePro->job;
        $this->start =  $this->ePro->start;
        // $this->end =  $this->ePro->end;
        if($this->ePro->end === 'Sekarang'){
            $this->check =true;
            // dd($this->check);
        }else{
            $this->end = $this->ePro->end;
        }
        // dd($this->check);
    }

    public function edit()
    {
        // $this->open = true;
        $this->uPro;
        $e = ModelsPengalaman::where('id', $this->uPro)->firstOrFail();
        $e->perusahaan = $this->name;
        $e->job = $this->posisi;
        $e->start = $this->start;
        $e->end = $this->end === '' ? 'Sekarang' : $this->end;

        session()->flash('message', 'Experience successfully Update.');
        $e->save();

        $this->closeModal();
    }

    public function render()
    {
        if($this->end !== ''){
            if($this->check===true){
                $this->end = '';
            }
        }
        $experience = ModelsPengalaman::all();
        return view('livewire.experience.pengalaman', compact([
            'experience'
        ]));
    }
}
