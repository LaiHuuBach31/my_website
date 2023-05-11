<?php

namespace App\Services;

use App\Policies\AttributePolicy;
use App\Policies\CategoryPolicy;
use App\Policies\ImagePolicy;
use App\Policies\PermissionPolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicy {

    public function __construct()
    {
        $this->defineGateCategory();
        $this->defineGateProduct();
        $this->defineGateAttribute();
        $this->defineGateImage();
        $this->defineGateUser();
        $this->defineGateRole();
        $this->defineGatePermission();
    }

    public function defineGateCategory()
    {
        Gate::define('category-index', [CategoryPolicy::class, 'view']);
        Gate::define('category-add', [CategoryPolicy::class, 'create']);
        Gate::define('category-edit', [CategoryPolicy::class, 'update']);
        Gate::define('category-delete', [CategoryPolicy::class, 'delete']);
    }

    public function defineGateProduct()
    {
        Gate::define('product-index', [ProductPolicy::class, 'view']);
        Gate::define('product-add', [ProductPolicy::class, 'create']);
        Gate::define('product-edit', [ProductPolicy::class, 'update']);
        Gate::define('product-delete', [ProductPolicy::class, 'delete']);
    }

    public function defineGateAttribute()
    {
        Gate::define('attribute-index', [AttributePolicy::class, 'view']);
        Gate::define('attribute-add', [AttributePolicy::class, 'create']);
        Gate::define('attribute-edit', [AttributePolicy::class, 'update']);
        Gate::define('attribute-delete', [AttributePolicy::class, 'delete']);
    }

    public function defineGateImage()
    {
        Gate::define('image-index', [ImagePolicy::class, 'view']);
        Gate::define('image-add', [ImagePolicy::class, 'create']);
        Gate::define('image-edit', [ImagePolicy::class, 'update']);
        Gate::define('image-delete', [ImagePolicy::class, 'delete']);
    }

    public function defineGateUser()
    {
        Gate::define('user-index', [UserPolicy::class, 'view']);
        Gate::define('user-add', [UserPolicy::class, 'create']);
        Gate::define('user-edit', [UserPolicy::class, 'update']);
        Gate::define('user-delete', [UserPolicy::class, 'delete']);
    }

    public function defineGateRole()
    {
        Gate::define('role-index', [RolePolicy::class, 'view']);
        Gate::define('role-add', [RolePolicy::class, 'create']);
        Gate::define('role-edit', [RolePolicy::class, 'update']);
        Gate::define('role-delete', [RolePolicy::class, 'delete']);
    }

    public function defineGatePermission()
    {
        Gate::define('permission-index', [PermissionPolicy::class, 'view']);
        Gate::define('permission-add', [PermissionPolicy::class, 'create']);
        Gate::define('permission-edit', [PermissionPolicy::class, 'update']);
        Gate::define('permission-delete', [PermissionPolicy::class, 'delete']);
    }
}