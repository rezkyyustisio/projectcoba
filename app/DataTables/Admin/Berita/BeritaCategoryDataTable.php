<?php

namespace App\DataTables\Admin\Berita;

use App\Models\Berita\BeritaCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BeritaCategoryDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'admin.berita.category.action')
            ->addIndexColumn();
    }

    public function query(BeritaCategory $model): QueryBuilder
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
                    ->selectStyleSingle()
                    ->buttons([
                        // Button::make('excel'),
                        // Button::make('csv'),
                        // Button::make('pdf'),
                    ]);
    }

    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')->title('#')->width('25')->addClass('text-center'),
            Column::make('name')->width('400px'),
            Column::computed('action')->exportable(false)->printable(false)->width('200px')->addClass('text-center')->title('Action'),
        ];
    }
    protected function filename(): string
    {
        return 'Berita_Category_' . date('YmdHis');
    }
}
