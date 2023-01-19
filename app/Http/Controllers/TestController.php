<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Models\Test;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TestController extends Controller
{
    public function index()
    {
        $tareas =  Test::with('category')->get();

        return view('datatable', compact('tareas'));
    }
    public function import(Request $request)
    {
        try {
            $file = $request->file('document');
            Excel::import(new UsersImport, $file);
            return redirect()->route('dashboard')->with('success', 'Test insert successfully');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {

            $failures = $e->failures();

            foreach ($failures as $failure) {
                $failure->row(); // row that went wrong
                $failure->attribute(); // either heading key (if using heading row concern) or column index
                $failure->errors(); // Actual error messages from Laravel validator
                $failure->values(); // The values of the row that has failed.
            }
            return redirect()->route('dashboard')->with('error', 'Erorr to insert data, Please contact to administrator');
        }
    }
}
