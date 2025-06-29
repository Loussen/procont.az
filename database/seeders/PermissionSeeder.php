<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $modules = [
            'menyular',
            'sehifeler',
            'kateqoriyalar',
            'mehsullar',
            'slayderler',
            'xeberler',
            'mushteriler',
            'foto qalereya',
            'sual-cavablar',
            'elaqe mesajlar',
            'ayarlar',
            'adminler',
            'rollar',
            'icazeler',
        ];

        $actions = ['siyahi', 'elave etmek', 'duzelish etmek', 'silmek'];

        foreach ($modules as $module) {
            foreach ($actions as $action) {
                $permissionName = $module . ' ' . $action;
                Permission::firstOrCreate(['name' => $permissionName]);
            }
        }
    }
}
