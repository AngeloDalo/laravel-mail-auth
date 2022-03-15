<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Model\Project;

class ProjectController extends Controller
{
    public function index()
    {
        //metto nella varibile Post tutti i post 
        $projects = Project::orderBy('created_at', 'desc')->get();

        //creo un file json 
        return response()->json([
            'response' => true,
            'results' =>  $projects,
        ]);
    }
}
