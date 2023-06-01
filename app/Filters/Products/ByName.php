<?php

namespace App\Filters\Products;

class ByName
{
    public function handle($query, $next)
    {
        $name = request('name');

        if($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        return $next($query);
    }
}