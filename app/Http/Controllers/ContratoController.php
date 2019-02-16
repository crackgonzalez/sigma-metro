<?php

namespace App\Http\Controllers;

use App\Contrato;
use Illuminate\Http\Request;
use Exception;

class ContratoController extends Controller
{
    // Vista todas los contratos
    public function index()
    {
        $contratos = Contrato::orderBy('horas','ASC')->get();
        return view('contrato.index')->with(compact('contratos'));
    }

    // Vista crear contrato
    public function create()
    {
        return view('contrato.create');
    }

    // Crea un contrato
    public function store(Request $request)
    {
        try{

            $request->validate([
                'modalidad' => 'required|unique:contratos|max:25|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ]*)*)+$/',
                'horas' => 'required|integer'
            ]);

            $contrato = new Contrato();
            $contrato->modalidad = $request->modalidad;
            $contrato->horas = $request->horas;
            $exito = $contrato->save();

            if($exito){
                alert()->success('Contrato creado exitosamente','OK')->autoclose(3000);
            }else{
                alert()->warning('No se pudo crear el contrato','ERROR')->autoclose(3000);
            }
        }catch(Exception $e){
            alert()->error($e,'Exception')->autoclose(3000);
        }
        return redirect('contrato');
    }

    // Vista editar contrato
    public function edit(Contrato $contrato)
    {
        return view('contrato.edit')->with(compact('contrato'));
    }

    //Modificar un contrato
    public function update(Request $request, Contrato $contrato)
    {
        try {
            $request->validate([
                'modalidad' => 'required|max:25|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ]*)*)+$/',
                'horas' => 'required|integer'
            ]);

            if($contrato->modalidad === $request->modalidad){
                $exito = $contrato->update($request->only('horas'));
            }else{
                $contrato->modalidad = $request->modalidad;
                $contrato->horas = $request->horas;
                $exito = $contrato->update();
            }

            if($exito){
                alert()->success('Contrato modificado exitosamente','OK')->autoclose(3000);
            }else{
                alert()->warning('No se pudo modificar el contrato','ERROR')->autoclose(3000);
            }
        } catch (Exception $e) {
            alert()->error($e,'Exception')->autoclose(3000);
        }
        return redirect('contrato');
    }

    // Elimina un contrato
    public function destroy($id){
        try {
            $contrato = Contrato::find($id);
            $exito = $contrato->delete();
            if($exito){
                alert()->success('Contrato eliminado exitosamente','OK')->autoclose(3000);
            }else{
                alert()->warning('No se pudo eliminar el contrato','ERROR')->autoclose(3000);
            }
        } catch (Exception $e) {
            alert()->error($e,'Exception')->autoclose(3000);
        }
        return redirect('contrato');
    }

    // Vista contratos desactivados
    public function delete(){
        $contratos = Contrato::orderBy('modalidad','ASC')->onlyTrashed()->get();
        return view('contrato.delete')->with(compact('contratos'));
    }

    // Restaurar un contrato
    public function restore($id){
        try {
            $contrato = Contrato::withTrashed()->where('id',$id);
            $exito = $contrato->restore();

            if($exito){
                alert()->success('El contrato fue restaurado','OK')->autoclose(3000);
            }else{
                alert()->warning('el contrato no pudo ser restaurada','ERROR')->autoclose(3000);
            }

        } catch (Exception $e) {
            alert()->error($e,'Exception')->autoclose(3000);
        }

        return redirect('contrato');
    }
}
