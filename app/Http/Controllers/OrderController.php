<?php

namespace App\Http\Controllers;

use App\DataTables\OrderDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Repositories\OrderRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OrderController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
    }

    /**
     * Display a listing of the Order.
     *
     * @param OrderDataTable $orderDataTable
     * @return Response
     */
    public function index(OrderDataTable $orderDataTable)
    {
        return $orderDataTable->render('orders.index');
    }

    /**
     * Show the form for creating a new Order.
     *
     * @return Response
     */
    public function create()
    {
        $services = \App\Models\Service::pluck('description' , 'id');
        $origin = \App\Models\Location::pluck('description' , 'id');
        $destination = \App\Models\Location::pluck('description' , 'id');
        $priority = (['Normal'=>'Normal', 'Urgente'=>'Urgente']);
        $status = (['Creado'=> 'Creado','Asignado' => 'Asignado','En viaje a Origen' => 'En viaje a Origen',
        'Retirado'=>'Retirado','En viaje a Destino'=>'En viaje a Destino',
        'Entregado'=>'Entregado','Completado'=>'Completado']);
        $users = \App\Models\User::pluck('name' , 'id');
        return view('orders.create' , compact('services' , 'origin' , 'destination' , 'priority' , 'status' , 'users'));
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->all();

        $order = $this->orderRepository->create($input);

        Flash::success('Order saved successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Display the specified Order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $services = \App\Models\Service::pluck('description' , 'id');
        $origin = \App\Models\Location::pluck('description' , 'id');
        $destination = \App\Models\Location::pluck('description' , 'id');
        $priority = (['Normal'=>'Normal', 'Urgente'=>'Urgente']);
        $status = (['Creado'=> 'Creado','Asignado' => 'Asignado','En viaje a Origen' => 'En viaje a Origen',
        'Retirado'=>'Retirado','En viaje a Destino'=>'En viaje a Destino',
        'Entregado'=>'Entregado','Completado'=>'Completado']);
        $users = \App\Models\User::pluck('name' , 'id');
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('orders.show')->with('order', $order)->with('services', $services, 'origin' , 'destination' , 'priority', 'status' ,'users');
    }
    /**
     * Show the form for editing the specified Order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $services = \App\Models\Service::pluck('description' , 'id');
        $origin = \App\Models\Location::pluck('description' , 'id');
        $destination = \App\Models\Location::pluck('description' , 'id');
        $status = (['Creado'=> 'Creado','Asignado' => 'Asignado','En viaje a Origen' => 'En viaje a Origen',
        'Retirado'=>'Retirado','En viaje a Destino'=>'En viaje a Destino',
        'Entregado'=>'Entregado','Completado'=>'Completado']);
        $users = \App\Models\User::pluck('name' , 'id');
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('orders.edit')->with('order', $order)->with('services', $services , 'origin' , 'destination', 'priority', 'status' , 'users');
    }

    /**
     * Update the specified Order in storage.
     *
     * @param  int              $id
     * @param UpdateOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderRequest $request)
    {

        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $order = $this->orderRepository->update($request->all(), $id);

        Flash::success('Order updated successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $this->orderRepository->delete($id);

        Flash::success('Order deleted successfully.');

        return redirect(route('orders.index'));
    }
}
