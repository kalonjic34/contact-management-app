<?php

namespace App\Models\Scopes;

/** @mixin \Illuminate\Database\Eloquent\Model */
trait SimpleSoftDeletes

{
        protected static function bootSimpleSoftDeletes(){
            /** @var class-string<\Illuminate\Database\Eloquent\Model> $modelClass */
            $modelClass = static::class;
            $modelClass::addGlobalScope(new SimpleSoftDeletingScope);

        }
}