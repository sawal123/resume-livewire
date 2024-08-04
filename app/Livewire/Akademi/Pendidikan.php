<?php

namespace App\Livewire\Akademi;

use App\Models\Pendidikan as ModelsPendidikan;
use Livewire\Component;

class Pendidikan extends Component
{
    public $school;
    public $sekolah='';
    public $modal = false;
    public $check = '';
    public $jurusan = '';
    public $start = '';
    public $end = '';
    public $disabled = '';

    public $titleModal = '';
    public $submitModal = '';

    public function confirmDelete($uuid)
    {
        $this->delModal = true;
        $this->uuid = $uuid;
    }
    public function cancelDel()
    {
        $this->delModal = false;
    }

    public $delModal = false;
    public $uuid;

    public function res()
    {
        $this->check = '';
        $this->sekolah = '';
        $this->jurusan = '';
        $this->start = '';
        $this->end = '';
        $this->disabled = '';
    }
public function openModal()
    {
        $this->modal = true;
        $this->titleModal = 'Tambah Data Pendidikan';
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
            'sekolah' => 'string|required|max:255',
            'jurusan' => 'string'
        ]);
        $ex = new ModelsPendidikan();

        $ex->sekolah = $this->sekolah;
        $ex->jurusan = $this->jurusan;
        $ex->start = $this->start;
        $ex->end  = $this->end === '' ? 'Sekarang' : $this->end;
        session()->flash('message', 'Pendidikan successfully saved.');
        $ex->save();
        $this->closeModal();
        $this->res();
    }

    public function delete($uuid)
    {
        // Logika penghapusan Anda di sini
        $del = ModelsPendidikan::where('id', $uuid)->firstOrFail();
        $del->delete();
        $this->cancelDel();
        session()->flash('message', 'Item deleted successfully.');
    }


    public $uPro;
    public $ePro;
    public function editModal($uuid)
    {
        $this->uPro = $uuid;
        $this->titleModal = 'Edit Data Pendidikan';
        $this->submitModal = 'edit';
        $this->modal = true;
        $this->ePro = ModelsPendidikan::where('id', $uuid)->firstOrFail();
        $this->sekolah =  $this->ePro->sekolah;
        $this->jurusan =  $this->ePro->jurusan;
        $this->start =  $this->ePro->start;
        if($this->ePro->end === 'Sekarang'){
            $this->check =true;
        }else{
            $this->end = $this->ePro->end;
        }
    }

    public function edit()
    {
        // $this->open = true;
        $this->uPro;
        $e = ModelsPendidikan::where('id', $this->uPro)->firstOrFail();
        $e->sekolah = $this->sekolah;
        $e->jurusan = $this->jurusan;
        $e->start = $this->start;
        $e->end = $this->end === '' ? 'Sekarang' : $this->end;

        session()->flash('message', 'Experience successfully Update.');
        $e->save();

        $this->closeModal();
    }


    public function render()
    {
        $this->school = ModelsPendidikan::all();
        // dd($this->sekolah);
        return view('livewire.akademi.pendidikan');
    }
}
