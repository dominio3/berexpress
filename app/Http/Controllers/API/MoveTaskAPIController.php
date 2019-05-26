<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMoveTaskAPIRequest;
use App\Http\Requests\API\UpdateMoveTaskAPIRequest;
use App\Models\MoveTask;
use App\Repositories\MoveTaskRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MoveTaskController
 * @package App\Http\Controllers\API
 */

class MoveTaskAPIController extends AppBaseController
{
    /** @var  MoveTaskRepository */
    private $moveTaskRepository;

    public function __construct(MoveTaskRepository $moveTaskRepo)
    {
        $this->moveTaskRepository = $moveTaskRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/moveTasks",
     *      summary="Get a listing of the MoveTasks.",
     *      tags={"MoveTask"},
     *      description="Get all MoveTasks",
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
     *                  @SWG\Items(ref="#/definitions/MoveTask")
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
        $this->moveTaskRepository->pushCriteria(new RequestCriteria($request));
        $this->moveTaskRepository->pushCriteria(new LimitOffsetCriteria($request));
        $moveTasks = $this->moveTaskRepository->all();

        return $this->sendResponse($moveTasks->toArray(), 'Move Tasks retrieved successfully');
    }

    /**
     * @param CreateMoveTaskAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/moveTasks",
     *      summary="Store a newly created MoveTask in storage",
     *      tags={"MoveTask"},
     *      description="Store MoveTask",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MoveTask that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MoveTask")
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
     *                  ref="#/definitions/MoveTask"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMoveTaskAPIRequest $request)
    {
        $input = $request->all();

        $moveTasks = $this->moveTaskRepository->create($input);

        return $this->sendResponse($moveTasks->toArray(), 'Move Task saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/moveTasks/{id}",
     *      summary="Display the specified MoveTask",
     *      tags={"MoveTask"},
     *      description="Get MoveTask",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MoveTask",
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
     *                  ref="#/definitions/MoveTask"
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
        /** @var MoveTask $moveTask */
        $moveTask = $this->moveTaskRepository->findWithoutFail($id);

        if (empty($moveTask)) {
            return $this->sendError('Move Task not found');
        }

        return $this->sendResponse($moveTask->toArray(), 'Move Task retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMoveTaskAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/moveTasks/{id}",
     *      summary="Update the specified MoveTask in storage",
     *      tags={"MoveTask"},
     *      description="Update MoveTask",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MoveTask",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MoveTask that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MoveTask")
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
     *                  ref="#/definitions/MoveTask"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMoveTaskAPIRequest $request)
    {
        $input = $request->all();

        /** @var MoveTask $moveTask */
        $moveTask = $this->moveTaskRepository->findWithoutFail($id);

        if (empty($moveTask)) {
            return $this->sendError('Move Task not found');
        }

        $moveTask = $this->moveTaskRepository->update($input, $id);

        return $this->sendResponse($moveTask->toArray(), 'MoveTask updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/moveTasks/{id}",
     *      summary="Remove the specified MoveTask from storage",
     *      tags={"MoveTask"},
     *      description="Delete MoveTask",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MoveTask",
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
        /** @var MoveTask $moveTask */
        $moveTask = $this->moveTaskRepository->findWithoutFail($id);

        if (empty($moveTask)) {
            return $this->sendError('Move Task not found');
        }

        $moveTask->delete();

        return $this->sendResponse($id, 'Move Task deleted successfully');
    }
}
