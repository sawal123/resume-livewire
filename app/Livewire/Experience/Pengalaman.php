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
        // dd('tes');
    }
    public function closeModal()
    {
        $this->modal = false;
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


    public function render()
    {
        $experience = ModelsPengalaman::all();
        return view('livewire.experience.pengalaman', compact([
            'experience'
        ]));
    }
}
