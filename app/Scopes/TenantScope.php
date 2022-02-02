<?php
namespace App\Scopes;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TenantScope implements Scope
{
	public function apply(Builder $builder, Model $model)
	{
		$builder->where('tenant_id', session()->get('tenant'));
	}
}