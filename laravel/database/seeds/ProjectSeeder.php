es (36 sloc)  955 Bytes
   
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Model\Project;
use App\User;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            [
                'name' => 'Gym',
                'description' => 'HTML, CSS, JS, VUE',
                'image' => '',
            ],
        ]; 

        $i=0;

        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->name = $project['name'];
            $newProject->description = $project['description'];
            $newProject->image = $project['image'];
            $name = "$newProject->name-$i";
            $newProject->slug = Str::slug($name, '-');
            $newProject->user_id = User::first()->id;
            $newProject->fill($project);
            $newProject->save();
            $i=$i+1;
        }
    }
}
