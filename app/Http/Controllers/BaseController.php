<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use \Request, \Response;

class BaseController extends Controller
{

	protected $repository;

	protected $manager;

	protected $data;

	public function __construct()
	{
		$this->data = Request::capture();
	}

	public function create()
	{
		// Se le pide al repositorio de datos retornar una entidad nueva.
		$entity  = $this->repository->newEntity();
		// Se crea un administrador de la entidad.
		$manager = $this->getManager($entity, $this->data);
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
		// Se le pide al repositorio de datos obtener la clase buscada por el id.
		$entity  = $this->repository->findOrFail( Input::get("id") );
		// Se crea un administrador de la entidad.
		$manager = $this->getManager($entity, $this->data);
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

	public function show($id)
	{
		return $this->repository->find($id);
	} 
}
