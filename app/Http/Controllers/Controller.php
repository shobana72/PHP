<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DB;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Foods;
use App\Models\Reservation;
use App\Models\Foodchef;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        $this->Admin = new Admin;
    }

    public function index(){
        return view('index');
    }




    public function blog(){
        $reg['sample']=DB::table('sample')->get();
        return view('blog')->with('reg', $reg);
    }

    public function blog_form(){
        return view('blog-form');
    }




 public function insert_blog_form(Request $request){
    $reg['title']= $request->input('title');
    $reg['slug']= $request->input('slug');
    $reg['category']= $request->input('category');
    $reg['subcategory']= $request->input('subcategory');
    $reg['description']= $request->input('description');

    $id=$this->Admin->storeBlog($reg);
    return redirect('blog')->with('message','Inserted Successfully');
}

public function edit_blog($id){
    $reg['name']=DB::table('sample')->get();
    $reg['sample']=DB::table('sample')->where('id', '=', $id)->get();
    return view('edit-blog')->with('reg', $reg);
}

public function update_blog(Request $request){
    if($files=$request->file('thumbnail')){
        $id=$request->input('id');
        $reg['title']= $request->input('title');
    $reg['slug']= $request->input('slug');
    $reg['category']= $request->input('category');
    $reg['subcategory']= $request->input('subcategory');
    $reg['description']= $request->input('description');

    $name=$files->getClientOriginalName();
    $files->move(public_path('/public/blog/Thumbnail'), $name);
    $reg['thumbnail'] = $name;

    DB::table('sample')->where('sample.id', '=', $id)->update(['title'=>$reg['title'], 'slug'=>$reg['slug'], 'category'=>$reg['category'], 'subcategory'=>$reg['subcategory'], 'description'=>$reg['description']]);
    }
    else{
        $id=$request->input('id');
        $reg['title']= $request->input('title');
    $reg['slug']= $request->input('slug');
    $reg['category']= $request->input('category');
    $reg['subcategory']= $request->input('subcategory');
    $reg['description']= $request->input('description');

    DB::table('sample')->where('sample.id', '=', $id)->update(['title'=>$reg['title'], 'slug'=>$reg['slug'], 'category'=>$reg['category'], 'subcategory'=>$reg['subcategory'], 'description'=>$reg['description']]);
    }
    return redirect('blog');
}

public function delete_blog($id){
    DB::table('sample')->where('id',$id)->delete();
    return redirect('blog');
}







public function user(){
    $data=User::all();
    return view('user', compact("data"));
}

public function food(){
    $data = foods::all();
    return view('food',compact("data"));
}

public function uploadfood(Request $request){
    $data = new foods;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $image->move('foodimage', $imagename);
        $data->image = $imagename; // Assign the image filename to the 'image' attribute
    }

    $data->title = $request->title;
    $data->price = $request->price;
    $data->description = $request->description;
    $data->save();

    return redirect()->back();
}

public function deletefood($id){
    $data=foods::find($id);
    $data->delete();
    return redirect()->back();
}

public function editfood($id){
    $data=foods::find($id);
    return view("editfood",compact("data"));
}

public function update(Request $request ,$id) {
   $data=foods::find($id);

   $image=$request->image;

   $imagename =time().'.'.$image->getClientOriginalExtension();

   $request->image->move('foodimage',$imagename);
   $data->image=$imagename;
   $data->title=$request->title;
   $data->price=$request->price;
   $data->description=$request->description;
   $data->save();

    // Redirect back with a success message
    return redirect('food')->with('success', 'Food item updated successfully');
}





public function form(Request $request){
    $data = new reservation;

    $data->name=$request->name;
    $data->email=$request->email;
    $data->phone=$request->phone;
    $data->guest=$request->guest;
    $data->date=$request->date;
    $data->time=$request->time;
    $data->message=$request->message;

    $data->save();
    return redirect()->back();
}

public function adminreservation(){
    $data=reservation::all();
    return view('adminreservation',compact("data"));
}

public function deleteuser($id){
    $data=user::find($id);
    $data->delete();
    return redirect()->back();
}


public function chef(){
    $data=foodchef::all();
    return view('chef', compact("data"));
}

public function uploadchef(Request $request){
    $data =new foodchef;

    $image=$request->image;

    $imagename = time() . '.' . $image->getClientOriginalExtension();
    $request->image->move('chefimage',$imagename);

    $data->image=$imagename;
    $data->name=$request->name;
    $data->speciality=$request->speciality;
    $data->save();
    return redirect()->back();
}

public function editchef($id){
    $data=foodchef::find($id);

    return view('editchef',compact("data"));
}

public function updatechef(Request $request, $id){
    $data=foodchef::find($id);

   $image=$request->image;

   if($image){

   $imagename =time().'.'.$image->getClientOriginalExtension();

   $request->image->move('chefimage',$imagename);
   $data->image=$imagename;
}
   $data->name=$request->name;
   $data->speciality=$request->speciality;

   $data->save();

    // Redirect back with a success message
    return redirect('chef')->with('success', 'Food item updated successfully');
}

public function deletechef($id)
{
    $data = foodchef::find($id);

    if (!$data) {
        return redirect()->back()->withErrors(['error' => 'Chef not found.']);
    }

    // Delete associated image
    if ($data->image) {
        $imagePath = public_path('chefimage') . '/' . $data->image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $data->delete();
    return redirect()->back()->with('success', 'Chef deleted successfully.');
}


}
