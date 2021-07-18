<?php

namespace App\DataTables;

use App\Models\CompnyMaster;
use App\Models\CompnyMasterDataTable;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CompnyMasterDataTables extends DataTable
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
//            ->addColumn('action', 'compnymasterdatatables.action')
            ->addColumn('action', function (CompnyMaster $compnyMaster) {

                  $action = "<a href='".route('admin.company_master.index')."' class='btn btn-success btn-sm mr-3' style='width: 35px;' ><i class='fas fa-edit'></i></a>";
                  $action .= "<a href='".route('admin.company_master.delete',$compnyMaster->id)."' class='btn btn-danger btn-sm ml-2' style='width: 35px;' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fas fa-trash-alt'></i></a>";
                  return   $action ;
            });



    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CompnyMasterDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CompnyMasterDataTables $model)
    {
        $data = CompnyMaster::select();
        return $this->applyScopes($data);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */


    public function html()
    {
        return $this->builder()
//                    ->setTableId('compnymasterdatatables-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->dom('Bfrtip')
//                    ->buttons(
//                        Button::make('csv'),
//                        Button::make('excel')
//                    );
                    ->parameters([
                        'dom'          => 'Bfrtip',
                        'buttons'      => ['excel', 'csv'],

                    ]);


    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('company_name')->title('Company Name'),
            Column::make('pan_number')->title('PAN'),
            Column::make('representative_name')->title('Representative Name'),
            Column::make('contact')->title('Mobile Number'),
            Column::make('address')->title('Address'),
            Column::make('action')->title('Action'),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'CompnyMasterDataTables_' . date('YmdHis');
    }
}
