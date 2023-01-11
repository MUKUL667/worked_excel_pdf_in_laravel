<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserImport;
use App\Exports\UserExport;
use PDF;
use DB;


class EmployeeController extends Controller
{
    public function showEmployees(){
        $employee = Employee::all();
        return view('index', compact('employee'));
      }
      public function createPDF() {
        // retreive all records from db
        $data = DB::table('employees')->get()->toarray();
        // share data to view
        // view()->share('index',$data);
        $pdf = PDF::loadView('pdf',[
            'result' => $data
        ]);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
      }

      public function fileImportExport()
      {
         return view('file-import');
      }


      public function fileImport(Request $request)
    {
        Excel::import(new UserImport, $request->file('file')->store('temp'));
        return back();
    }
      public function fileExport()
      {
          return Excel::download(new UserExport, 'users-collection.xlsx');
      }
}
