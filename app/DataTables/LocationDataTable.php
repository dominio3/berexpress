<?php

namespace App\DataTables;

use App\Models\Location;
use Form;
use Yajra\Datatables\Services\DataTable;
//notas:importo clase para manejar usuarios
use Illuminate\Support\Facades\Auth;
use App\Repositories\LocationRepository;

class LocationDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {

        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'locations.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $locations = Location::query();

        /*
        if (Auth::user()->role === 'Administrador'){
            //notas:muestro todas las ubicaciones para el rol administrador
            return $this->applyScopes($orders);
        }
        */
        
        if (Auth::User()->role === 'Cliente') {
            //notas:muestro solamente en la tabla locations del usuario que inicio sesion
            $locations = Location::query()->where('users_id','=', Auth::User()->id);
        }
        return $this->applyScopes($locations);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        if (Auth::User()->role === 'Administrador' || Auth::User()->role === 'SuperUser') {
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
        } else {
            return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '120px'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => true,
                'buttons' => [
                    'reload',
                    'colvis'
                ]
            ]);
        }
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'description' => ['name' => 'description', 'data' => 'description'],
            'address' => ['name' => 'address', 'data' => 'address'],
            'number' => ['name' => 'number', 'data' => 'number'],
            'town' => ['name' => 'town', 'data' => 'town'],
            'postal_code' => ['name' => 'postal_code', 'data' => 'postal_code'],
            'country' => ['name' => 'country', 'data' => 'country'],
            'latitude' => ['name' => 'latitude', 'data' => 'latitude'],
            'longitude' => ['name' => 'longitude', 'data' => 'longitude'],
            'atention_hour' => ['name' => 'atention_hour', 'data' => 'atention_hour'],
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
        return 'locations';
    }
}
