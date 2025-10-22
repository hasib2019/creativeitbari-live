<?php

namespace Modules\Installer\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Modules\Installer\Models\Configuration;
use Modules\Installer\Traits\InstallerTrait;

class PurchaseVerifyMiddleware
{
    use InstallerTrait;
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {

        if(isDemoMode()){
            return $next($request);
        }

        if($this->licenseExists()){
            return $next($request);
        }

        return $this->resetSetupState();
    }

    private function resetSetupState()
    {
        try {
            if(Schema::hasTable('configurations')){
                Configuration::updateInstallationStatus(0);
                Configuration::updateSetupStatus(0);
            }
            session()->flush();
        } catch (\Exception $e) {
            Log::error('Error resetting setup state: ' . $e->getMessage());
        }

        return redirect()->route('installer.welcome');

    }

}
