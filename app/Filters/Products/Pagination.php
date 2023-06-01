<?php

namespace App\Filters\Products;

class Pagination
{
    public function handle($query, $next)
    {
        $page = request('page');
        $rows = request('rows');

        if($page && $rows) {
            $query->paginate($rows);
        }

        return $next($query);
    }
}