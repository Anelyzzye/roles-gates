<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Estudiante;
use DB;

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
        ->paginate(3);
        


        return view('home',['alumno' => $alumno],compact('info'));
    }

    /*
    * Funcionalidad de autocompletado
    * Muestra la vista
    */

    public function autocompletar()
    {
        return view ('autocompletado.inicio');
    }

    /*
    *
    */
    public function mostrardata(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('estudiantes')
                ->where('username','LIKE','%'.$query.'%')
                ->get();
    
            $output = '<ul  class="dropdpwn-menu"
                            aria-labelledby="dropdownMenuLink"
                            style="display:block;
                            position:relative;">';
                        foreach($data as $row)
                            {
                                $output .= '<li style="list-style:none"><a class="dropdown-item" href="#">'.$row->username.'</a></li>';
                            }
            $output .= '</ul>';
            echo $output;
        }
    }



}
