<?php

namespace App\Http\Controllers;

use App\DataTables\ConsignementDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateConsignementRequest;
use App\Http\Requests\UpdateConsignementRequest;
use App\Repositories\ConsignementRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ConsignementController extends AppBaseController
{
    /** @var  ConsignementRepository */
    private $consignementRepository;

    public function __construct(ConsignementRepository $consignementRepo)
    {
        $this->consignementRepository = $consignementRepo;
    }

    /**
     * Display a listing of the Consignement.
     *
     * @param ConsignementDataTable $consignementDataTable
     * @return Response
     */
    public function index(ConsignementDataTable $consignementDataTable)
    {
        return $consignementDataTable->render('consignements.index');
    }

    /**
     * Show the form for creating a new Consignement.
     *
     * @return Response
     */
    public function create()
    {
        $locations = \App\Models\Location::pluck('description' , 'id');
        $states = ([ 'Habilitado' => 'Habilitado' , 'Inhabilitado' =>'Inhabilitado' ]);
        return view('consignements.create' , compact('locations'));
    }

    /**
     * Store a newly created Consignement in storage.
     *
     * @param CreateConsignementRequest $request
     *
     * @return Response
     */
    public function store(CreateConsignementRequest $request)
    {
        $input = $request->all();

        $consignement = $this->consignementRepository->create($input);

        Flash::success('Consignement saved successfully.');

        return redirect(route('consignements.index'));
    }

    /**
     * Display the specified Consignement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $locations = \App\Models\Location::pluck('description' , 'id');
        $consignement = $this->consignementRepository->findWithoutFail($id);

        if (empty($consignement)) {
            Flash::error('Consignement not found');

            return redirect(route('consignements.index'));
        }

        return view('consignements.show')->with('consignement', $consignement, compact('locations'));
    }

    /**
     * Show the form for editing the specified Consignement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $locations = \App\Models\Location::pluck('description' , 'id');
        $consignement = $this->consignementRepository->findWithoutFail($id);

        if (empty($consignement)) {
            Flash::error('Consignement not found');

            return redirect(route('consignements.index'));
        }

        return view('consignements.edit')->with('consignement', $consignement, compact('locations'));
    }

    /**
     * Update the specified Consignement in storage.
     *
     * @param  int              $id
     * @param UpdateConsignementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConsignementRequest $request)
    {
        $consignement = $this->consignementRepository->findWithoutFail($id);

        if (empty($consignement)) {
            Flash::error('Consignement not found');

            return redirect(route('consignements.index'));
        }

        $consignement = $this->consignementRepository->update($request->all(), $id);

        Flash::success('Consignement updated successfully.');

        return redirect(route('consignements.index'));
    }

    /**
     * Remove the specified Consignement from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $consignement = $this->consignementRepository->findWithoutFail($id);

        if (empty($consignement)) {
            Flash::error('Consignement not found');

            return redirect(route('consignements.index'));
        }

        $this->consignementRepository->delete($id);

        Flash::success('Consignement deleted successfully.');

        return redirect(route('consignements.index'));
    }
}
