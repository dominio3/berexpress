<?php

namespace App\DataTables;

use App\Models\Consignement;
use Form;
use Yajra\Datatables\Services\DataTable;

class ConsignementDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'consignements.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $consignements = Consignement::query();

        return $this->applyScopes($consignements);
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
            'document' => ['name' => 'document', 'data' => 'document'],
            'priority' => ['name' => 'priority', 'data' => 'priority'],
            'line01' => ['name' => 'line01', 'data' => 'line01'],
            'line02' => ['name' => 'line02', 'data' => 'line02'],
            'line03' => ['name' => 'line03', 'data' => 'line03'],
            'line04' => ['name' => 'line04', 'data' => 'line04'],
            'line05' => ['name' => 'line05', 'data' => 'line05'],
            'total_price' => ['name' => 'total_price', 'data' => 'total_price'],
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
        return 'consignements';
    }
}
