<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SimpleSoftDeletingScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->whereNull('deleted_at');
    }

    public function extend(Builder $builder){
        $this->addWithTrashed($builder);
        $this->addOnlyTrashed($builder);
    }

    protected function addWithTrashed(Builder $builder)
    {
        $scope = $this;
        $builder->macro('withTrashed', fn (Builder $builder, $withTrashed = true) =>
            $builder->withoutGlobalScope($scope)
        );
    }

    protected function addOnlyTrashed(Builder $builder)
    {
        $scope = $this;
        $builder->macro('onlyTrashed', function (Builder $builder) use ($scope) {
            return $builder->withoutGlobalScope($scope)->whereNotNull('deleted_at');
        });
    }
}
