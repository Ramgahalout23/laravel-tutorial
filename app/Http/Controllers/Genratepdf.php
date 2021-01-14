<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Employee;
class Genratepdf extends Controller
{
    function userdatapdf(Request $req)
{
        $Employee = new Employee;
        $Employee->email=$req->email;
        $Employee->password=$req->password;
        $Employee->address=$req->address;
        $Employee->city=$req->city;
        $Employee->save();
        if( $Employee->save()){
        echo "data saved";
        }

    //   print_r( $req->input());


}

 public function showpdfdata(){
      $employee = Employee::paginate(5);

      return view('showdata', compact('employee'));
    }

 public function createPDF() {
    // retreive all records from db
    $data = Employee::all();

    // share data to view
    view()->share('employee',$data);
    $pdf = PDF::loadView('showdata', $data);

    // download PDF file with download method
    return $pdf->download('Testpdf_file.pdf');
  }

public function checkapi(){
$data = Http::get("https://reqres.in/api/users?page=1");
return view('apidata',['collection'=>$data['data']]);

  }
//login
public function userlogin(Request $req){
        $data= $req->input('user');
        $req->session()->put('user',$data);
        return redirect('profile');

      }
//update user data
public function showdata($id){

$data= Employee::find($id);
return view('updateuserdata',['data'=>$data]);
}

public function updatedata(Request $req){
    $data = Employee::find($req->Name);
    $data->email=$req->email;
    $data->password=$req->password;
    $data->city=$req->city;

    $data->save();
    if($data->save()){
   return redirect('showdata');

    }


}

//file uploade function

public function fileupload(Request $req)
{

    return $req->file('file')->store('img');
}

//check db operations

public function operations(){
        // return DB::table('Employee')->get();
    // return DB::table('Employee')->sum('Name');
        //  return DB::table('Employee')->min('Name');
        //   return DB::table('Employee')->min('email');
              // return DB::table('Employee')->max('password');
        // return DB::table('Employee')->avg('Name');
        return  DB::table('Employee')->select(DB::raw('MIN(id) AS DateStart, MAX(id) AS DateEnd'))
   ->get();




}
//joins

public function joins(){
    return DB::table('Employee')
        ->select('Employee.email','Employee.password','company.company')
        ->join('company','Employee.id','company.id')
        ->where('company.name','ram')
        ->get();
}
///Accessor
public function accessors(){
    return Employee::all();

}

//mutator

public function mutator(){
    $mutator = new Employee;
    $mutator->name="Bruce";
    $mutator->email="Bruce";
    $mutator->city="Hydrabad";
    $mutator->address="address";
    $mutator->save();
}
///


public function datarelationship(){

    return Employee::find(1)->onetoone;
}







// Postman Api data get update and delete and Search

public function FirstApi(){

    return(['Name'=>'RAm','Gmail'=>'ram@gmail.com']);
}

public function databasegetApi($id=null)
{
        //return Employee::all();
        return $id?Employee::find($id):Employee::all();

}
public function databasepostApi(Request $req)
{
        $data= new Employee;
        $data->name=$req->name;
        $data->password=$req->password;
        $data->email=$req->email;
        $data->address=$req->address;
        $data->city=$req->city;
       $result = $data->save();
       if($result){
        return["data"=>"has been saved"];
}else
return["data"=>"operation Failed"];
}

public function databaseUpdateApi( Request $req){
    $data = Employee::find($req->id);
        $data->name=$req->name;
        $data->password=$req->password;
        $data->email=$req->email;
        $data->address=$req->address;
        $data->city=$req->city;
        $data->save();
        if($data){
            return["data"=>"has been saved"];
    }else
    return["data"=>"operation Failed"];
}
public function databaseDeleteApi($id){
    $data = Employee::find($id);
    $result=$data->delete();
    if($result){

        return["record "=>"Deleted sucessfully"];
    }else
    return["record "=>" Error "];

}
public function search($Name){
return Employee::where("Name","like","%".$Name."%")->get();
if($result){

    return["record "=>"Deleted sucessfully"];
}else
return["record "=>" Error "];
}

}
