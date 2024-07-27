<?php

namespace App\Livewire\Dashboard;

use App\Models\Tool;
use Livewire\Livewire;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use App\Models\Project as ModelsProject;

error_reporting(0);
class Project extends Component
{
    use WithFileUploads;
    public $open = false;
    public $editPro;
    public $tools;

    public $titleModal = '';
    public $submitModal = '';

    public function resetModal()
    {
        $this->link = '';
        $this->name = '';
        $this->editPro = '';
        // $this->selectedOptions = [];
        $this->img = '';
    }

    public function openModal()
    {
        $this->open = true;
        $this->titleModal = 'Tambah Data Project';
        $this->submitModal = 'save';
    }
    public function closeModal()
    {
        $this->resetModal();
        $this->open = false;
        $this->selectedOptions = [];
        // dd('tes');
    }



    public $options = [];
    public $selectArray = [];


    public function mount()
    {
        // Contoh data options, bisa diambil dari database
        $tools = Tool::all();
        foreach ($tools as $tool) {
            $this->options[] = ['id' => $tool->uuid, 'name' => $tool->name];
        }
        // dd($this->options);
    }


    #[Validate('required', 'string|max:50')]
    public $name = '';

    #[Validate('string')]
    public $selectedOptions = [];

    #[Validate('required', 'string')]
    public $link = '';

    #[Validate('required', 'image|mimes:jpg,png,gif|max:1024',)]
    public $img;

    public $category='';

    public function save()
    {
        // dd($this->category);
        $this->open = true;
        $this->validate([
            'name' => 'required|string|max:50',
            'link' => 'required|string',
            'img' => 'required|image|mimes:jpg,png,gif|max:1024'
        ]);
        $project = new ModelsProject();
        $project->uuid = Str::uuid();
        $project->name = $this->name;
        $project->tools = json_encode($this->selectedOptions);
        $project->link = $this->link;
        $project->category = $this->category;
        $project->slug = Str::slug($this->name);
        if ($this->img) {
            // Handle file upload
            $imageName = 'sawal' . Str::random(4) . '.' . $this->img->getClientOriginalExtension();
            $this->img->storeAs('thumbnails', $imageName, 'public');
            $project->thumbnail =  $imageName;
        }
        session()->flash('message', 'Project successfully saved.');
        $project->save();
        $this->closeModal();
    }

    public $uPro;
    public function editModal($uuid)
    {
        $this->uPro = $uuid;
        $this->titleModal = 'Edit Data Project';
        $this->submitModal = 'edit';
        $this->open = true;
        $this->editPro = ModelsProject::where('uuid', $uuid)->firstOrFail();
        $this->tools = json_decode($this->editPro->tools);
        $this->name =  $this->editPro->name;
        $this->link =  $this->editPro->link;
        $this->category =  $this->editPro->category;
    }

    public function edit()
    {
        // $this->open = true;
        $this->uPro;
        $update = ModelsProject::where('uuid', $this->uPro)->firstOrFail();
        $update->name = $this->name;
        $update->link = $this->link;
        $update->category = $this->category;
        if ($this->img) {
            if ($update->thumbnail) {
                Storage::disk('public')->delete('thumbnails/' . $update->thumbnail);
            }
            // Handle file upload
            $imageName = 'sawal' . Str::random(4) . '.' . $this->img->getClientOriginalExtension();
            $this->img->storeAs('thumbnails', $imageName, 'public');
            $update->thumbnail =  $imageName;
        }
        session()->flash('message', 'Project successfully Update.');
        if ($this->selectedOptions === []) {
            
            $update->save();
        } else {
            // dd('tes');
            $update->tools = $this->selectedOptions;
            $update->save();
        }
        
       $this->closeModal();
       
    }




    public function modalDel()
    {
    }
    public $delModal = false;
    public $uuid;
    public function confirmDelete($uuid)
    {
        $this->delModal = true;
        $this->uuid = $uuid;
    }
    public function cancelDel()
    {
        $this->delModal = false;
    }

    public function delete($uuid)
    {
        // Logika penghapusan Anda di sini
        $del = ModelsProject::where('uuid', $uuid)->firstOrFail();
        if ($del->thumbnail) {
            Storage::disk('public')->delete('thumbnails/' . $del->thumbnail);
        }
        $del->delete();
        $this->cancelDel();
        session()->flash('message', 'Item deleted successfully.');
    }




    public $project;
    public function view()
    {
        $this->project = ModelsProject::all();
        // dd($this->project);
    }

    public function render()
    {
        $this->view();
        return view('livewire.dashboard.project');
    }
}
