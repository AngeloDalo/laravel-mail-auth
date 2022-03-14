<?php

namespace App\Http\Controllers\Admin;
use App\Model\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prophecy\Call\Call;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc');
        return view('admin.projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //controllo se l'utente è loggato
        $data['user_id'] = Auth::user()->id;


        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image'
        ]);

        if (!empty($data['image'])) {
            $img_path = Storage::put('uploads', $data['image']);
            $data['image'] = $img_path;
        }

        $project = new Project();
        $project->fill($data);
        $project->slug = $project->createSlug($data['nome']);
        $project->save();

        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.projects.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->id != $project->user_id) {
            abort('403');
        }
        //bisognerà passare i dati precompilati
        return view('admin.projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        //vedere se comic che andiamo a modificare è dell'utente
        if (Auth::user()->id != $comic->user_id) {
            abort('403');
        }

        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image'
        ]);

        //controlli se il dato è statp modificato
        if ($data['name'] != $project->name) {
            $project->name = $data['name'];
            //slug solamente nel nome
            $project->slug = $project->createSlug($data['name']);
        }
        if ($data['description'] != $project->description) {
            $project->description = $data['description'];
        }
        if (!empty($data['image'])) {
            Storage::delete($project->image);
            $img_path = Storage::put('uploads', $data['image']);
            $project->image = $img_path;
        }
        
        $comic->update();

        return redirect()->route('admin.project.show', $project->slug);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //non posso cancellare file che non sono miei
        if (Auth::user()->id !== $project->user_id) {
            abort('403');
        }
        
        $project->delete();
        //il with serve per il messaggio
        return redirect()->route('admin.projects.index')->with('status', "project id $comic->id deleted");
    }
}
