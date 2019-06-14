<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConsignementAPIRequest;
use App\Http\Requests\API\UpdateConsignementAPIRequest;
use App\Models\Consignement;
use App\Repositories\ConsignementRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ConsignementController
 * @package App\Http\Controllers\API
 */

class ConsignementAPIController extends AppBaseController
{
    /** @var  ConsignementRepository */
    private $consignementRepository;

    public function __construct(ConsignementRepository $consignementRepo)
    {
        $this->consignementRepository = $consignementRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/consignements",
     *      summary="Get a listing of the Consignements.",
     *      tags={"Consignement"},
     *      description="Get all Consignements",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Consignement")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->consignementRepository->pushCriteria(new RequestCriteria($request));
        $this->consignementRepository->pushCriteria(new LimitOffsetCriteria($request));
        $consignements = $this->consignementRepository->all();

        return $this->sendResponse($consignements->toArray(), 'Consignaciones recuperadas con éxito');
    }

    /**
     * @param CreateConsignementAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/consignements",
     *      summary="Store a newly created Consignement in storage",
     *      tags={"Consignement"},
     *      description="Store Consignement",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Consignement that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Consignement")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Consignement"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateConsignementAPIRequest $request)
    {
        $input = $request->all();

        $consignements = $this->consignementRepository->create($input);

        return $this->sendResponse($consignements->toArray(), 'Consignación guardada con éxito');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/consignements/{id}",
     *      summary="Display the specified Consignement",
     *      tags={"Consignement"},
     *      description="Get Consignement",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Consignement",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Consignement"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Consignement $consignement */
        $consignement = $this->consignementRepository->findWithoutFail($id);

        if (empty($consignement)) {
            return $this->sendError('Consignación no encontrada');
        }

        return $this->sendResponse($consignement->toArray(), 'Consignación recuperada con éxito');
    }

    /**
     * @param int $id
     * @param UpdateConsignementAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/consignements/{id}",
     *      summary="Update the specified Consignement in storage",
     *      tags={"Consignement"},
     *      description="Update Consignement",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Consignement",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Consignement that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Consignement")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Consignement"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateConsignementAPIRequest $request)
    {
        $input = $request->all();

        /** @var Consignement $consignement */
        $consignement = $this->consignementRepository->findWithoutFail($id);

        if (empty($consignement)) {
            return $this->sendError('Consignación no encontrada');
        }

        $consignement = $this->consignementRepository->update($input, $id);

        return $this->sendResponse($consignement->toArray(), 'Consignación actualizada con éxito');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/consignements/{id}",
     *      summary="Remove the specified Consignement from storage",
     *      tags={"Consignement"},
     *      description="Delete Consignement",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Consignement",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Consignement $consignement */
        $consignement = $this->consignementRepository->findWithoutFail($id);

        if (empty($consignement)) {
            return $this->sendError('Consignación no encontrada');
        }

        $consignement->delete();

        return $this->sendResponse($id, 'Consignación eliminada con éxito');
    }
}
