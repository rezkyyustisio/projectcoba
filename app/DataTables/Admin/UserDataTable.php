<?php

namespace App\DataTables\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'admin.user.action')
            ->editColumn('description', fn($row) => Str::limit($row->description, 50))
            ->addIndexColumn();
    }

    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1, 'asc')
                    ->scrollX(true)
                    ->selectStyleSingle();
    }

    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')->title('#')->width('25')->addClass('text-center'),
            Column::make('name')->width('200px')->title('Nama Lengkap'),
            Column::make('email')->width('200px'),
            Column::make('description')->width('200px'),
            Column::make('facebook')->width('100px'),
            Column::make('x')->width('100px')->title('X / Twitter'),
            Column::make('instagram')->width('100px'),
            Column::make('telegram')->width('100px'),
            Column::make('linked_in')->width('100px'),
            Column::computed('action')->exportable(false)->printable(false)->width('250px')->addClass('text-center')->title('Action'),
        ];
    }

    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
