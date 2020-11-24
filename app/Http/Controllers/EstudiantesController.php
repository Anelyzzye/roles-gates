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

    public function registros(Request $request){
      $alumno = $request['alumno'];
        $info = Estudiante::select(['id','name','email'])
        ->where('name','LIKE','%'.$alumno.'%')
        ->get();


        return view('home',['alumno' => $alumno],compact('info'));
    }

}
