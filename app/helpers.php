<?php
use Illuminate\Support\Str;
function sortable($label, $column= null){
    $column=$column ?? Str::snake($label);
    $sort_by=request()->query('sort_by');
    $sort_by=!$sort_by || strpos($sort_by,'-')=== 0 ? $column : "-{$column}";

    $url = request()->fullUrlWithQuery(['sort_by'=>$sort_by]);
    return "<a href='{$url}' class='sortable'>{$label}</a>";

}