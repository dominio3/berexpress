<?php

namespace App\DataTables;

use App\Models\Service;
use Form;
use Yajra\Datatables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class ServiceDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'services.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $services = Service::query();

        return $this->applyScopes($services);
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
            'price' => ['name' => 'price', 'data' => 'price']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'services';
    }
}
