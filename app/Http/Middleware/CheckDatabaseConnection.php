<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckDatabaseConnection
{
    public function handle($request, Closure $next)
    {
        try {
            DB::connection()->getPdo();
            if(!DB::connection()->getDatabaseName()){
                throw new \Exception("No database selected");
            }
        } catch (\Exception $e) {
            Log::error("Database connection failed: ".$e->getMessage());
            return response()->view('errors.database', [], 500);
        }

        return $next($request);
    }
}