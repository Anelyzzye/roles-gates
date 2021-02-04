@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <!--@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li><a href=" {{ route('administrativa' )}}">área administrativa</a></li>
                        <li><a href="{{ route('areausuario')}}">área NO PRIVILEGIADA</a></li>
                    </ul>-->
                    @canany(['admin','capturista','reportes'])
                    <form action="{{ route('home') }}" method="GET">

                    <input type="text" class="form-control" name="alumno" placeholder="Escribe el nombre del alumno">
                      <input type="submit" value="Visualizar registros" class="form-control">
                    </form>
                    @endcanany
                    <br>
                    <table class="table">

                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Correo </th>
                          @canany(['admin','capturista'])
                          <th scope="col" colspan="3">Acciones</th>
                          @endcanany
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($info as $i )
                        <tr>
                          <td>   {{$i->id}} </td>
                          <td>  {{$i->name}} </td>
                          <td>  {{$i->email}}  </td>

                          @canany(['admin','capturista'])
                          <td>
                            <button type="button" class="btn btn-outline-success">Nuevo
                              </button>
                          </td>

                          @endcanany


                          @canany(['admin','capturista'])
                          <td>
                            <button type="button" class="btn btn-outline-warning">
                              Actualizar
                            </button>
                          </td>
                          @endcanany
                          @can('admin')
                          <td>
                            <button type="button" class="btn btn-outline-danger" data-target="#modal-delete-{{$i->id}}" data-toggle="modal">Eliminar
                            </button>
                          </td>
                          @endcan
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
{{$info->render()}}
@include('modaleliminaalumno')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
