<?php

namespace App\Http\Controllers\Students;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\UserDetails;
use App\Models\Subject;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\Facades\DataTables;
use Spatie\Browsershot\Browsershot;

class StudentController extends Controller
{
 public function index()
{
    return view('Admin.UserList');
}
    public function getUsersData()
{
    $data = UserDetails::select([
        'id',
        'title',
        'name',
        'email',
        'phone',
        'course',
        'gender',
        'date_of_birth',
        'address'
    ]);

    return DataTables::of($data)
        ->addColumn('action', function ($row) {
            return '
                <a href="/students/edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>
                <a href="/students/delete/'.$row->id.'" class="btn btn-danger btn-sm">Delete</a> ';
        })
        ->rawColumns(['action'])
        ->make(true);
}
    
     public function edit($id)
    {
        $UserDetails = UserDetails::findOrFail($id);

        return view('Admin.edit', compact('UserDetails'));
    }

     public function update(Request $request, $id)
    {
        DB::beginTransaction();//starting point of the transacion
        try{ 
            $UserDetails = UserDetails::findOrFail($id);

        $UserDetails->update([
            'title'    => $request->title,
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
            'phone'    => $request->phone,
            'course'   => $request->course,
            'gender'   => $request->gender,
            'date_of_birth'=> $request->date_of_birth,
            'address'  => $request->address,
        ]);

            DB::commit();//if there is no error in above function it will save all the data 

        Toastr::success('User Updated Successfully', 'Success');

        return redirect('/students-details');
    }catch(\Exception $e){
        DB::rollBack();//if there is any error it move to catch block and then it will re direct to the previous step

        Toastr::error('Failed to Update User', 'Error');

        return redirect()->back();
    }
    }  

    public function delete($id)
    {
       $UserDetails = UserDetails::findOrFail($id);

        return view('admin.delete', compact('UserDetails'));
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try{ UserDetails::destroy($id);

        DB::commit();

        Toastr::success('User Deleted Successfully', 'Success');

        return redirect('/students-details');
        }catch(\Exception$e){
            DB::rollBack();
            Toastr::error('Failed to Delete User', 'Error');
            return redirect()->back();
        }
    }





public function dashboard()
{
    return view('pages.Dashboard');
}

public function generatePdf()
{
   $html = view('Pages.Dashboard', session()->all())->render();

    Browsershot::html($html)
        ->format('A4')
        ->savePdf(public_path('dashboard.pdf'));

    return response()->download(public_path('dashboard.pdf'));
}
public function generateScreenshot()
{
    $html = view('Pages.Dashboard')->render();

    Browsershot::html($html)
        ->save(public_path('dashboard.png'));

    return response()->download(public_path('dashboard.png'));
}

}
