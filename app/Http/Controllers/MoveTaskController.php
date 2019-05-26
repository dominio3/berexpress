<?php

namespace App\Http\Controllers;

use App\DataTables\MoveTaskDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMoveTaskRequest;
use App\Http\Requests\UpdateMoveTaskRequest;
use App\Repositories\MoveTaskRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MoveTaskController extends AppBaseController
{
    /** @var  MoveTaskRepository */
    private $moveTaskRepository;

    public function __construct(MoveTaskRepository $moveTaskRepo)
    {
        $this->moveTaskRepository = $moveTaskRepo;
    }

    /**
     * Display a listing of the MoveTask.
     *
     * @param MoveTaskDataTable $moveTaskDataTable
     * @return Response
     */
    public function index(MoveTaskDataTable $moveTaskDataTable)
    {
        return $moveTaskDataTable->render('move_tasks.index');
    }

    /**
     * Show the form for creating a new MoveTask.
     *
     * @return Response
     */
    public function create()
    {
        return view('move_tasks.create');
    }

    /**
     * Store a newly created MoveTask in storage.
     *
     * @param CreateMoveTaskRequest $request
     *
     * @return Response
     */
    public function store(CreateMoveTaskRequest $request)
    {
        $input = $request->all();

        $moveTask = $this->moveTaskRepository->create($input);

        Flash::success('Move Task saved successfully.');

        return redirect(route('moveTasks.index'));
    }

    /**
     * Display the specified MoveTask.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $moveTask = $this->moveTaskRepository->findWithoutFail($id);

        if (empty($moveTask)) {
            Flash::error('Move Task not found');

            return redirect(route('moveTasks.index'));
        }

        return view('move_tasks.show')->with('moveTask', $moveTask);
    }

    /**
     * Show the form for editing the specified MoveTask.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $moveTask = $this->moveTaskRepository->findWithoutFail($id);

        if (empty($moveTask)) {
            Flash::error('Move Task not found');

            return redirect(route('moveTasks.index'));
        }

        return view('move_tasks.edit')->with('moveTask', $moveTask);
    }

    /**
     * Update the specified MoveTask in storage.
     *
     * @param  int              $id
     * @param UpdateMoveTaskRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMoveTaskRequest $request)
    {
        $moveTask = $this->moveTaskRepository->findWithoutFail($id);

        if (empty($moveTask)) {
            Flash::error('Move Task not found');

            return redirect(route('moveTasks.index'));
        }

        $moveTask = $this->moveTaskRepository->update($request->all(), $id);

        Flash::success('Move Task updated successfully.');

        return redirect(route('moveTasks.index'));
    }

    /**
     * Remove the specified MoveTask from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $moveTask = $this->moveTaskRepository->findWithoutFail($id);

        if (empty($moveTask)) {
            Flash::error('Move Task not found');

            return redirect(route('moveTasks.index'));
        }

        $this->moveTaskRepository->delete($id);

        Flash::success('Move Task deleted successfully.');

        return redirect(route('moveTasks.index'));
    }
}
