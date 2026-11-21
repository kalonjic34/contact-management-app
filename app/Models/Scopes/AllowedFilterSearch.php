<?php


namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait AllowedFilterSearch{

        function scopeFilterByCompany(Builder $query, ...$keys){
        foreach($keys as $key){
            if($value= request()->query($key)){
                $query->where($key,$value);
            }
        }

        return $query;
    }

    function scopeAllowedSearch(Builder $query, ...$keys): Builder
    {
        if (!request()->filled('search') || $keys === []) {
            return $query;
        }

        $search = request()->query('search');

        return $query->where(function (Builder $query) use ($keys, $search) {
            foreach ($keys as $index => $key) {
                $method = $index === 0 ? 'where' : 'orWhere';
                $query->{$method}($key, 'LIKE', "%{$search}%");
            }
        });
    }
        function scopeAllowedTrash(Builder $query): Builder
    {
        if (request()->boolean('trash')) {
            return $query->onlyTrashed();
        }

        return $query;
    }


}