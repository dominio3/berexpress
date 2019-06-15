<?php

namespace App\DataTables;

use App\Models\Order;
use Form;
use Yajra\Datatables\Services\DataTable;

use App\Repositories\OrderRepository;

class OrderDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'orders.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        /*
        @if (Auth::user()->role === 'Administrador')
            <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Pedidos</span></a>
        @elseif (Auth::user()->role === 'Cliente')
            <!-- VER SOLO PEDIDOS DEL USER CLIENTE -->
            <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Mis Pedidos (falta implementar)</span></a>
        @else
            <!-- VER SOLO PEDIDOS DEL USER CADETE -->
            <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Mis Pedidos (falta implementar)</span></a>
        @endif
        */
        $orders = Order::query();
        //$misorders = Order::query()->where('users_id','=', Auth::User()->id);
        if (Auth::user()->role === 'Administrador'){
            //notas:muestro todas las ordenes para el rol administrador
            return $this->applyScopes($orders);
        }

        if (Auth::user()->role === 'Cliente' || Auth::user()->role === 'Cadete') {
            //notas:muestro solamente en la tabla orders del usuario que inicio sesion
            $orders = Order::query()->where('users_id','=', Auth::User()->id);
            return $this->applyScopes($orders);
        }
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '120px'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => true,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'date' => ['name' => 'date', 'data' => 'date'],
            'services_id' => ['name' => 'services_id', 'data' => 'services_id'],
            'origin' => ['name' => 'origin', 'data' => 'origin'],
            'destination' => ['name' => 'destination', 'data' => 'destination'],
            'distance' => ['name' => 'distance', 'data' => 'distance'],
            'contact_name' => ['name' => 'contact_name', 'data' => 'contact_name'],
            'contact_phone' => ['name' => 'contact_phone', 'data' => 'contact_phone'],
            'takes' => ['name' => 'takes', 'data' => 'takes'],
            'rain' => ['name' => 'rain', 'data' => 'rain'],
            'bulk' => ['name' => 'bulk', 'data' => 'bulk'],
            'priority' => ['name' => 'priority', 'data' => 'priority'],
            'observations' => ['name' => 'observations', 'data' => 'observations'],
            'subtotal' => ['name' => 'subtotal', 'data' => 'subtotal'],
            'status' => ['name' => 'status', 'data' => 'status'],
            'users_id' => ['name' => 'users_id', 'data' => 'users_id']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'orders';
    }
}
