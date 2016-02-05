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

    /**
     * @return mixed
     */
	public function create()
	{
        if($this->manager->create()) {
            return $this->responseEntityStore($this->manager->getEntity());
        }
        return $this->responseBadRequest($this->manager->getErrors());
	}

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

	public function update()
	{
		// Se le pide al repositorio de datos obtener la clase buscada por el id.
		$entity  = $this->repository->findOrFail( Request::get("id") );
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

    /**
     * @param $data
     * @return mixed
     */
    protected function responseEntityStore($data)
    {
        return Response::json($data,201);
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function responseObject($data)
    {
        return Response::json($data,200);
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function responseBadRequest($data)
    {
        return Response::json($data, 400);
    }
}
