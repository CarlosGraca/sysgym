<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
	protected $table = 'tenants';
	use SoftDeletes;
    protected $fillable = ['company_name', 'subdomain_name', 'address_1', 'address_2', 'country', 'country_code', 'state', 'state_code', 'city', 'latitude', 'longitude', 'status_code_id', 'status_date', 'active'
                         ];
}

