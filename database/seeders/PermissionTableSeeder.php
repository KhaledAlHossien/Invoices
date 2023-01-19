<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Invoices',
            'Invoices list',
            'Paid invoices',
            'Partially paid invoices',
            'Unpaid invoices',
            'Invoices archive',
            'Reports',
            'Invoices report',
            'Customers report',
            'Users',
            'Users list',
            'Users permissions',
            'Settings',
            'Products',
            'Sections',


            'Create invoice',
            'Delete invoice',
            'Excel export',
            'Payment status change',
            'Edit invoice',
            'Archive invoice',
            'Print invoice',
            'Create attachment',
            'Delete attachment',

            'Create user',
            'Edit user',
            'Delete user',

            'Show permission',
            'Create permission',
            'Edit permission',
            'Delete permission',

            'create product',
            'Edit product',
            'Delete product',

            'Create section',
            'Edit section',
            'Delete section',
            'Notifications',

        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
