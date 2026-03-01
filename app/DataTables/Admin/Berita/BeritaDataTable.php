<?php

namespace App\DataTables\Admin\Berita;

use App\Models\Berita\Berita;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class BeritaDataTable extends DataTable
{
   public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->filterColumn('category_name', fn($query, $keyword) => $query->where('berita_categories.name', 'like', "%{$keyword}%"))
            ->filterColumn('createdBy_name', fn($query, $keyword) => $query->where('users.name', 'like', "%{$keyword}%"))
            ->editColumn('top', fn($query) => $query->top ?'<span class="badge bg-success">Yes</span>' : '<span class="badge bg-danger">No</span>')
            ->editColumn('highlight', fn($query) => $query->highlight ?'<span class="badge bg-success">Yes</span>' : '<span class="badge bg-danger">No</span>')
            ->editColumn('created_at', fn($query) => Carbon::parse($query->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY'))
            ->editColumn('tags', function($query){
                $datas = explode(',', $query->tags);
                $tags = '';
                foreach($datas as $data){
                    $tags .= '<span class="badge bg-primary">'.$data.'</span> ';
                }
                return $tags;
            })
            ->editColumn('description', fn($row) => Str::limit(strip_tags($row->description), 50))
            ->addColumn('action', 'admin.berita.berita.action')
            ->addIndexColumn()
            ->rawColumns(['top','highlight','tags','action']);
    }

    public function query(Berita $model): QueryBuilder
    {
        return $model->newQuery()
            ->join('berita_categories', 'beritas.category_id', '=', 'berita_categories.id')
            ->join('users', 'beritas.created_by', '=', 'users.id')
            ->select([
                    'beritas.*',
                    'berita_categories.name as category_name',
                    'users.name as createdBy_name',
                ]);
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1, 'desc')
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
            Column::computed('DT_RowIndex')->title('#')->width('25px')->addClass('text-center'),
            Column::make('created_at')->width('70px')->title('Time'),
            Column::make('category_name')->width('100px')->title('Category'),
            Column::make('name')->width('100px'),
            Column::make('description')->width('200px'),
            Column::make('tags')->width('150px'),
            Column::make('top')->width('50px'),
            Column::make('highlight')->width('50px'),
            Column::make('createdBy_name')->width('100px')->title('Created By'),
            Column::computed('action')->exportable(false)->printable(false)->width('250px')->addClass('text-center')->title('Action'),
        ];
    }

    protected function filename(): string
    {
        return 'Berita_' . date('YmdHis');
    }
}
