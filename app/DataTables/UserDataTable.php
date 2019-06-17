<?php

namespace App\DataTables;

use App\Models\User;
use Form;
use Yajra\Datatables\Services\DataTable;
//notas:importo clase para manejar usuarios
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;

use App\Http\Controllers\NotificationController;
use App\Message;
//use App\User;
use App\Notifications\NewMessage;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;



class UserDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'users.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $users = User::query();
        if (Auth::User()->role === 'Cliente' || Auth::User()->role === 'Cadete' || Auth::User()->role === 'Invitado') {
            //notas:muestro el perfil del usuario que inicio sesion para poder ver/editar
            $users = User::query()->where('id','=', Auth::User()->id);
            $toUser = User::query()->where('id','=', '20');
            //Notification::send($toUser, new NewMessage($users));
        }
        //sino devuelvo todos (administrador/superuser)
        return $this->applyScopes($users);
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
                    'print',
                    'reload',
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
        if (Auth::User()->role === 'Cliente' || Auth::User()->role === 'Cadete' || Auth::User()->role === 'Invitado') {
            return [
                'name' => ['name' => 'name', 'data' => 'name'],
                'email' => ['name' => 'email', 'data' => 'email'],
                // 'password' => ['name' => 'password', 'data' => 'password'],
                // 'remember_token' => ['name' => 'remember_token', 'data' => 'remember_token'],
                'address' => ['name' => 'address', 'data' => 'address'],
                'number' => ['name' => 'number', 'data' => 'number'],
                //'state' => ['name' => 'state', 'data' => 'state'],
                'phone' => ['name' => 'phone', 'data' => 'phone'],
                'role' => ['name' => 'role', 'data' => 'role'],
                'image' => ['name' => 'image', 'data' => 'image']
                //'visibility' => ['name' => 'visibility', 'data' => 'visibility']
            ];
        }

        else {
            return [
                'name' => ['name' => 'name', 'data' => 'name'],
                'email' => ['name' => 'email', 'data' => 'email'],
                'password' => ['name' => 'password', 'data' => 'password'],
                'remember_token' => ['name' => 'remember_token', 'data' => 'remember_token'],
                'address' => ['name' => 'address', 'data' => 'address'],
                'number' => ['name' => 'number', 'data' => 'number'],
                //'state' => ['name' => 'state', 'data' => 'state'],
                'phone' => ['name' => 'phone', 'data' => 'phone'],
                'role' => ['name' => 'role', 'data' => 'role'],
                'image' => ['name' => 'image', 'data' => 'image'],
                'visibility' => ['name' => 'visibility', 'data' => 'visibility']
            ];
        }
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users';
    }
}
