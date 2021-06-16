<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{

    public function store(Request $request)
    {   
        $profile_pic = $request->file('image');
        
         //Initiate Files
         if (isset($profile_pic) && $profile_pic!=NULL) {            
            $fileExt=$profile_pic->getClientOriginalExtension();
            Storage::disk('public')->put($profile_pic->getFilename().'.'.$fileExt, File::get($profile_pic));
            $pic_file = $profile_pic->getFilename().'.'.$fileExt;
        }
        $user = new Data([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'Address'=>$request->get('Address'),
            'DOB'=>$request->get('Date'),
            'state'=>$request->get('state'),
            'Age'=>$request->get('Age'),
            'Pic'=>isset($pic_file)?$pic_file:''
        ]);
        $user->save();
        return redirect()->intended('/');
    }

    public function show()
    {
        $data = Data::get();
        return view('welcome',['data'=>$data]);
    }

  
    public function fetch(Request $request)
    {
        $userId = $request->get('userId');
        $user = Data::where('id',$userId)->first();
        $html ='';
        $html = '<div class="form-group">
        <input type="hidden" value='.$userId.' name="id">
        <label for="exampleFormControlFile1">Profile Pic</label>
        <input type="file" class="form-control-file" value='.$user->Pic.' name="image">
    </div>
    <br>
    <div class="form-group">
        <label for="exampleInputName1">Full Name</label>
        <input type="text" name="name" class="form-control" value='.$user->name.' id="usernames" aria-describedby="emailHelp" placeholder="Enter Full Name">
      </div>
      <h5 id="usercheck" style="color: red;" >
      **Username is missing
    </h5>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="email" class="form-control" id="email" value='.$user->email.' aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    
    <div class="form-group">
      <label for="exampleInputAddress1">Address</label>
      <textarea name="Address" id="" cols="10" rows="5" class="form-control">'.$user->Address.'</textarea> 
    </div>
    <div class="form-group">
        <label for="">Age Group</label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="Age" id="Age1" value="10-20">
        <label class="form-check-label" for="Age1">10-20</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="Age" id="Age2" value="20-30">
        <label class="form-check-label" for="Age2">20-30</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="Age" id="Age3" value="30-40">
        <label class="form-check-label" for="Age3">30-40</label>
    </div>
    </div>
    <label for="">State</label>
    <select class="form-control form-control-sm" name="state">
        <option value="Himachal">Himachal</option>
        <option value="Uttar Pradesh">Uttar Pradesh</option>
        <option value="Andra Pradesh">Andra Pradesh</option>
        <option value="Karnataka">Karnataka</option>
      </select>
    <div class="form-group">
        <label for="exampleInputDate1">Date of Birth</label>
        <input type="Date" name="Date" class="form-control" value='.$user->DOB.' id="exampleInpuDatel1">
    </div>';
    return $html;
    }

    public function update(Request $request, Data $data)
    {
        $userId= $request->get('id');
        $profile_pic = $request->file('image');
        if (isset($profile_pic) && $profile_pic!=NULL) {            
            $fileExt=$profile_pic->getClientOriginalExtension();
            Storage::disk('public')->put($profile_pic->getFilename().'.'.$fileExt, File::get($profile_pic));
            $pic_file = $profile_pic->getFilename().'.'.$fileExt;
        }
        if(Data::where('id','=',$userId)->exists()){
            $user=Data::where('id',$userId)->first();
            $user->name= $request->get('name');
            $user->email= $request->get('email');
            $user->Address=$request->get('Address');
            $user->Age=$request->get('Age');
            $user->state=$request->get('state');
            $user->DOB=$request->get('Date');
            if(isset($pic_file)){
                $user->Pic = isset($pic_file)?$pic_file:'';
              }
            $user->save();
        }
        return redirect()->intended('/');
    }

    public function destroy(Request $request)
    {
        $userId = $request->get('userId');
        if(Data::where('id','=',$userId)->exists()){
            $user=Data::where('id',$userId)->first();
            $user->delete(); 
        }
    }
}
