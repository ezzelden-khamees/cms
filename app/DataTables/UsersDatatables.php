<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class UsersDatatables extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('checkbox', 'admin.users.btn.checkbox')
            ->addColumn('edit', 'admin.users.btn.edit')      // edit ==>admin.admins.btn.edit
            ->addColumn('delete', 'admin.users.btn.delete')   // delete ==>admin.admins.btn.delete
            ->addColumn('status', 'admin.users.btn.status')
			->rawColumns([
				'edit',
                'delete',
                'checkbox',
                'status',
			]);
       
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\AdminDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        // request has user or company or vendor
        return User::query()->where(function ($q) {
            if (request()->has('status')) {
                return $q->where('status', request('status'));
            }
        });
    }




    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('admindatatables-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ) // my work
                    ->parameters([
                                'dom'        => 'Blfrtip',
                                'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50,  trans('admin.all_record')]],
                                'buttons'    => [
                                    
                                    [ 'text'      => '<i class="fa fa-plus"></i> '.trans('admin.add'),  'className' => 'btn btn-info' , "action" => "function(){
                                        window.location.href = '".\URL::current()."/create';
                                    }" ],

                                    ['extend' => 'print', 'className' => 'btn btn-primary', 'text' => '<i class="fa fa-print"></i>'],
                                    ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-file"></i> '.trans('admin.ex_csv')],
                                    ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fa fa-file"></i> '.trans('admin.ex_excel')],
                                    ['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fa fa-refresh"></i>'],
                                    [ 'text' => '<i class="fa fa-trash"></i>', 'className' => 'btn btn-danger delBtn' ],
                                  ],

                                'initComplete' => " function () {
                                    this.api().columns([2,3,4,5,7]).every(function () {
                                        var column = this;
                                        var input = document.createElement(\"input\");
                                        $(input).appendTo($(column.footer()).empty())
                                        .on('keyup', function () {
                                            column.search($(this).val(), false, false, true).draw();
                                        });
                                    });
                                }",

                               
                
                                'language' => datatable_lang(),    // helper function 
        
            
                    ]);
    }



    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns() {
		return [
			[
				'name'       => 'checkbox',
				'data'       => 'checkbox',
				'title'      => '<input type="checkbox" class="check_all" onclick="check_all()" />',
				'exportable' => false,
				'printable'  => false,
				'orderable'  => false,
				'searchable' => false,
			], [
				'name'  => 'id',
				'data'  => 'id',
				'title' => '#',
			], [
				'name'  => 'name',
				'data'  => 'name',
				'title' => trans('admin.admin_name'),
            ], [
				'name'  => 'age',
				'data'  => 'age',
				'title' => trans('admin.age'),
            ], [
				'name'  => 'adress',
				'data'  => 'adress',
				'title' => trans('admin.adress'),
            ], [
				'name'  => 'mob',
				'data'  => 'mob',
				'title' => trans('admin.mobile'),
            ], [
				'name'  => 'status',
				'data'  => 'status',
				'title' => trans('admin.status'),
			],[
				'name'  => 'email',
				'data'  => 'email',
				'title' => 'Admin Email',
				'title' => trans('admin.admin_email'),
			], [
				'name'  => 'created_at',
				'data'  => 'created_at',
				'title' => trans('admin.created_at'),
			], [
				'name'  => 'updated_at',
				'data'  => 'updated_at',
				'title' => trans('admin.updated_at'),
			], [
				'name'       => 'edit',
				'data'       => 'edit',
				'title'      => trans('admin.edit'),
				'exportable' => false,
				'printable'  => false,
				'orderable'  => false,
				'searchable' => false,
			], [
				'name'       => 'delete',
				'data'       => 'delete',
				'title'      => trans('admin.delete'),
				'exportable' => false,
				'printable'  => false,
				'orderable'  => false,
				'searchable' => false,
			],

		];
	}



    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'UsersDatatables_' . date('YmdHis');
    }
}
