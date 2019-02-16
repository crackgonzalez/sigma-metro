<?php

namespace App\Http\Controllers;

use App\Linea;
use Illuminate\Http\Request;
use File;
use Exception;

class LineaController extends Controller
{
    // Vista lineas activas
    public function index(){
        $lineas = Linea::orderBy('nombre','ASC')->get();
        return view('linea.index')->with(compact('lineas'));
    }

    // Vista crear linea
    public function create(){
        return view('linea.create');
    }

    // Crea una linea
    public function store(Request $request){
        try{
            $request->validate([
                'nombre' => 'required|unique:lineas|max:25|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ]*)*)+$/',
                'imagen' => 'required|mimes:jpg,jpeg,bmp,png'
            ]);

            if($request->hasFile('imagen')){

                $foto = $request->file('imagen');
                $ruta = public_path().'/imagenes/lineas';
                $nombreFoto = uniqid().$foto->getClientOriginalName();
                $movido = $foto->move($ruta,$nombreFoto);

                if($movido){
                    $linea = new Linea();
                    $linea->imagen = $nombreFoto;
                    $linea->nombre = $request->nombre;
                    $exito = $linea->save();

                    if($exito){
                        alert()->success('Linea creada exitosamente','OK')->autoclose(3000);
                    }else{
                        alert()->warning('No se pudo crear la linea','ERROR')->autoclose(3000);
                    }
                }
            }
        }catch(Exception $e){
            alert()->error($e,'Exception')->autoclose(3000);
        }

        return redirect('linea');
    }

    // Vista editar linea
    public function edit(Linea $linea){
        return view('linea.edit')->with(compact('linea'));
    }

    //Modificar una linea
    public function update(Request $request, Linea $linea){
        try{
            $request->validate([
                'nombre' => 'required|max:25|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ]*)*)+$/',
                'imagen' => 'mimes:jpg,jpeg,bmp,png'
            ]);

            if($request->hasFile('imagen')){
                $foto = $request->file('imagen');
                $ruta = public_path().'/imagenes/lineas';
                $nombreFoto = uniqid().$foto->getClientOriginalName();
                $movido = $foto->move($ruta,$nombreFoto);

                if($movido){
                    if($linea->nombre === $request->nombre){
                        $imagenAnterior = $ruta.'/'.$linea->imagen;
                        $linea->imagen = $nombreFoto;
                        $exito = $linea->update();
                    }else{
                        $imagenAnterior = $ruta.'/'.$linea->imagen;
                        $linea->imagen = $nombreFoto;
                        $linea->nombre = $request->nombre;
                        $exito = $linea->update();
                    }

                    if($exito){
                        File::delete($imagenAnterior);
                        alert()->success('La linea fue modificada correctamente','OK')->autoclose(3000);
                    }
                }
            }else{
                $modificada = $linea ->update($request->only('nombre'));
                if($modificada){
                    alert()->success('La linea fue modificada correctamente','OK')->autoclose(3000);
                }else{
                    alert()->warning('La linea no pudo ser modificada','ERROR')->autoclose(3000);
                }
            }
        } catch (Exception $e) {
            alert()->error($e,'Exception')->autoclose(3000);
        }
        return redirect('linea');
    }

    // Elimina una linea
    public function destroy($id){
        try {
            $linea = Linea::find($id);
            $exito = $linea->delete();

            if($exito){
                alert()->success('La linea fue eliminada','OK')->autoclose(3000);
            }else{
                alert()->warning('La linea no pudo ser eliminada','ERROR')->autoclose(3000);
            }
        }catch(Exception $e){
            alert()->error($e,'Exception')->autoclose(3000);
        }

        return redirect('linea');
    }

    // Vista lineas desactivadas
    public function delete(){
        $lineas = Linea::orderBy('nombre','ASC')->onlyTrashed()->get();
        return view('linea.delete')->with(compact('lineas'));
    }

    // Restaurar una linea
    public function restore($id){
        try {
            $linea = Linea::withTrashed()->where('id',$id);
            $exito = $linea->restore();

            if($exito){
                alert()->success('La linea fue restaurada','OK')->autoclose(3000);
            }else{
                alert()->warning('La linea no pudo ser restaurada','ERROR')->autoclose(3000);
            }

        } catch (Exception $e) {
            alert()->error($e,'Exception')->autoclose(3000);
        }

        return redirect('linea');
    }
}
