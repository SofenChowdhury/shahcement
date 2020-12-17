<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Alert;
use App\model\Directory;use App\model\location\Division;use App\model\location\City;use App\model\location\Service;
class DirectoryController extends Controller
{
    public function Index(){
        $title = "Directory List";
        $get_directory  = Directory::leftjoin('divisions','divisions.id','directories.devision_id')
            ->leftjoin('cities','cities.id','directories.city_id')
            ->leftjoin('services','services.id','directories.service_id')
            ->select('divisions.division_name','cities.city_name','services.service_name','directories.*')
            ->get();
        $get_divission  = Division::get();
        return View('admin.directory.index',compact('title','get_directory','get_divission'));
    }
    public function saveDirectory(Request $request){
        $rules = array(
            'division_id'   => 'required',
            'city_id'       => 'required',
            'service_id'    => 'required',
            'name'          => 'required',
        );

        $this->validate($request, $rules);

        $createDirectory = New Directory();

        $createDirectory->devision_id   = $request->division_id;
        $createDirectory->city_id       = $request->city_id;
        $createDirectory->service_id    = $request->service_id;
        $createDirectory->name          = $request->name;
        $createDirectory->email         = $request->email;
        $createDirectory->phone         = $request->phone;
        $createDirectory->note          = $request->note;
		$image   			            = $request->file('image');

        if($image){
            $user_cover 	= rand().$request->file('image')->getClientOriginalName();
            $destination 	= 'uploads/directory';
            $request->file('image')->move($destination, $user_cover);

            $createDirectory->image 	= $destination.'/'.$user_cover;
        }

        $createDirectory->save();

        Alert::toast('Directory Created Successfully !', 'success');

        return redirect()->back();
    }
    public function updateDirectory(Request $request){
    	$image           = $request->file('image');

        if($image){
            $dirImage 	= rand().$request->file('image')->getClientOriginalName();
            $destination 	= 'uploads/directory';
            $request->file('image')->move($destination, $dirImage);

            $photo    = $destination.'/'.$dirImage;
            $getUser 	= Directory::where('id',$request->id)->first();
            // delete the root image
	    	$image_path = $getUser->image;
			if(File::exists($image_path)) {
			    File::delete($image_path);
			}

	    	$update = Directory::where('id', $request->id)
	            ->update([
	               'image' 	=> $photo,
	            ]);
        }
        
        $update = Directory::where('id', $request->id)
	            ->update([
	               'devision_id'     => $request->division_id,
	               'city_id' 	     => $request->city_id,
                   'service_id'      => $request->service_id,
                   'name'            => $request->name,
                   'email'           => $request->email,
                   'phone'           => $request->phone,
                   'note'            => $request->note,
	            ]);
        Alert::toast('Directory Updated Successfully !', 'Success');
    	return redirect()->back();
    }
    public function Delete($id){

        $deleteDirectory     	= Directory::where('id', $id)->delete();
    	return 'Delete Forum';
    }
    // Ajax

    public function actiondirectory($id,$id2){

        $update     = Directory::where('id', $id)
            ->update([
               'status'     => $id2,
            ]);
        return "Success";
    }
}
