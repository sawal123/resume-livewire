<?php

namespace App\Http\Controllers;

use App\Livewire\Dashboard\Project;
use App\Models\Project as ModelsProject;
use App\Models\Tool;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    
    public function index(){
        $multimedia = ModelsProject::where('category', 'multimedia')->get();
        $programmer = ModelsProject::where('category', 'programmer')->get();

        $sMulti = Tool::where('category', 'multimedia')->get();
        $sPro = Tool::where('category', 'programmer')->get();
        // dd($sMulti);
        // dd($projects);

        return view('welcome', compact(['multimedia', 'programmer','sMulti', 'sPro']));
    }
}
