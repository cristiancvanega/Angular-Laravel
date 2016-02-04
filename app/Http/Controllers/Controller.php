<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use \Input, \Redirect, \View, \Response, \App;

class BaseController extends Controller
{
// Clase donde o repositorio de datos.
	protected $repository;
	// Manager de la clase.
	protected $manager;
    protected $list = false;
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout) )
		{
			$this->layout = View::make($this->layout);
		}
	}
	/**
	 * Funcion basica para almacenar los datos en una entidad.
	 * @return Array Respuesta al usuario sobre el flujo de la clase.
	 */
	public function create()
	{
		// Se obtiene todos los datos enviados por el usuario.
		$data    = Input::all();
		// Se le pide al repositorio de datos retornar una entidad nueva.
		$entity  = $this->repository->newEntity();
		// Se crea un administrador de la entidad.
		$manager = $this->getManager($entity, $data);
		// Se le pide almacenar los datos
		if( $manager->save() )
		{
			// Respuesta llamada cuando la clase puede reliazar de manera correcta la asignacion.
			return Response::json([
				'state'=>'true'
			]);
		}
		// Respuesta obtenida cuando la clase no pudo relizar la transacción.
		return Response::json([
			'state'	=> 'false',
			'errors' => $manager->getErrors()->toArray()
		]);
	}
	/**
	 * Funcion usada para actualizar los datos de la entidad.
	 * @return Array Respuesta al usuario sobre el flujo de la clase.
	 */
	public function update()
	{
		// Se obtiene todos los datos enviados por el usuario.
		$data    = Input::all();
		// Se le pide al repositorio de datos obtener la clase buscada por el id.
		$entity  = $this->repository->findOrFail( Input::get("id") );
		// Se crea un administrador de la entidad.
		$manager = $this->getManager($entity, $data);
		// Se le pide al administrador actualizar los datos.
		if( $manager->update() )
		{
			// Respuesta llamada cuando la clase puede reliazar de manera correcta la asignacion.
			return Response::json([
				'state'=>'true'
			]);
		}
		// Respuesta obtenida cuando la clase no pudo relizar la transacción.
		return Response::json([
			'state'	=> 'false',
			'errors' => $manager->getErrors()->toArray()
		]);
	}
	/**
	 * Informacion basica de la entidad por un id enviado.
	 * @param  String $id Identificador de la entidad.
	 * @return Object     Entidad serializada.
	 */
	public function show($id)
	{
		return $this->repository->find($id);
	}
	/**
	 * Permite listar una clase o entidad entregado un array el cual puede ser visualizado por pagina.
	 * @return Model listado de objetos mas datos del listado.
	 */
    public function listmodel()
    {
        if( $this->list )
        {
            return $this->repository->listmodel();
        }
        App::Abort(404);
    }
    public function total()
    {
        return $this->repository->total();
    }
	/**
	 *
	 */
	public function response( $state )
	{
		Response::json([
			'state'   => ($state == true ? 'true' : 'false'),
			'data'    => $this->manager->getEntity()->toArray(),
			'message' => $this->manager->getMessage(),
			'errors'  => $this->manager->getErrors()->toArray(),
		]);
	}  
}
