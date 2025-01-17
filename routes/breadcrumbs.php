<?php

use App\Models\Coupon;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

// Home > Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Dashboard', route('dashboard'));
});

// Home > Dashboard > User Management
Breadcrumbs::for('user-management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User Management', route('user-management.users.index'));
});

// Home > Dashboard > User Management > Users
Breadcrumbs::for('user-management.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Users', route('user-management.users.index'));
});

// Home > Dashboard > User Management > Users > [User]
Breadcrumbs::for('user-management.users.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.users.index');
    $trail->push(ucwords($user->name), route('user-management.users.show', $user));
});

// Home > Dashboard > User Management > Roles
Breadcrumbs::for('user-management.roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Roles', route('user-management.roles.index'));
});

// Home > Dashboard > User Management > Roles > [Role]
Breadcrumbs::for('user-management.roles.show', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('user-management.roles.index');
    $trail->push(ucwords($role->name), route('user-management.roles.show', $role));
});

// Home > Dashboard > User Management > Permission
Breadcrumbs::for('coupon.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Coupons', route('coupon.index'));
});

Breadcrumbs::for('coupon.create', function (BreadcrumbTrail $trail) {
    $trail->parent('coupon.index');
    $trail->push('Creat coupon', route('coupon.create'));
});


Breadcrumbs::for('settings.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Settings', route('setting.index'));
});

Breadcrumbs::for('seo_main.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('SEO Main', route('seo.main.index'));
});

Breadcrumbs::for('seo_main.create', function (BreadcrumbTrail $trail) {
    $trail->parent('seo_main.index');
    $trail->push('SEO Create', route('seo.main.create'));
});



