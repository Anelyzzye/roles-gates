<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Estudiante;

class EstudiantesController extends Controller
{
    public function index(Request $request){
    	 if ($request->ajax()) {
            $data = Estudiante::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
      
        return view('welcome');
    }

    public function admin(){
        return view('administrador.administrador');
    }

    public function noadmin(){
        return view('usuario.usuario');
    }
}
