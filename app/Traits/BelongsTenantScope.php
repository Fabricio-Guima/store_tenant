<?php
namespace App\Traits;
use App\Scopes\TenantScope;

trait BelongsTenantScope
{
	protected  static function booted()
    {
        static::addGlobalScope(new TenantScope());

        static::creating( function($model){
            // $model->tenant_id = session()->get('tenant');
        });
    }
}