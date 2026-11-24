<?php


namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait AllowedSort{

    function parseSortDirection(): string
    {
        $sortBy = request()->query('sort_by');

        return is_string($sortBy) && str_starts_with($sortBy, '-') ? 'desc' : 'asc';
    }

    function parseSortColumn($column=null): string
    {
        $sortBy = request()->query('sort_by');

        if (!is_string($sortBy)) {
            return '';
        }

        return str_starts_with($sortBy, '-') ? substr($sortBy, 1) : $sortBy;
    }

    public function scopeAllowedSorts(Builder $query, array $columns, ?string $defaultColumn = null): Builder
    {
        if ($columns === []) {
            return $query;
        }

        $defaultColumn = in_array($defaultColumn, $columns, true) ? $defaultColumn : $columns[0];
        $column = $this->parseSortColumn();

        if (!in_array($column, $columns, true)) {
            return $query->orderBy($defaultColumn);
        }

        return $query->orderBy($column, $this->parseSortDirection());
    }
}