<?php

namespace App\Http\Controllers;

use App\Models\TeamModel;
use Illuminate\Http\Request;


class TeamController extends Controller
{
    public function teamTable(){
        $data['getRecord'] = TeamModel::getRecord();
        return view('backend.team.list',$data);
    }

    public function addTeam(){
        return view('backend.team.add');
    }

    public function insertTeam(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'team_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'designation' => 'required|string|max:255',
            'linkedin' => 'required|string|max:255',
            'status' => 'required'
        ]);

        $save = new TeamModel;
        $save->name = $request->name;
        $save->designation = $request->designation;
        $save->linkedin = $request->linkedin;
        $save->status = $request->status;
        

        if (!empty($request->hasFile('team_image'))){
            $file = $request->file('team_image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/team/', $imageName);
            $save->team_image = $imageName;
        }
        $save->save();

        return redirect()->route('team_back')->withInput()->with('success', 'Team Created successful');
    }

    public function editTeam($id){
        $data['getRecord'] = TeamModel::getSingle($id);
        return view('backend.team.edit', $data);
    }

    public function updateTeam($id, Request $request){

        $save = TeamModel::getSingle($id);
        $save->name = $request->name;
        $save->designation = $request->designation;
        $save->linkedin = $request->linkedin;
        $save->status = $request->status;

        if (!empty($request->hasFile('team_image'))){

            if(!empty($save->getImage())){
                unlink('upload/team/'.$save->team_image);
            }

            $file = $request->file('team_image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/team/', $imageName);
            $save->team_image = $imageName;
        }
        $save->save();

        return redirect()->route('team_back')->with('success', 'Team Updated successful');


    }

    public function deleteTeam($id){
        $save = TeamModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->route('team_back')->with('success', 'Team Deleted successful');
    }
}
