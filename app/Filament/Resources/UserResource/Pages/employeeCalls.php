<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\Page;
use Filament\Widgets\StatsOverviewWidget;

class employeeCalls extends Page
{
    protected static ?string $title = 'Employee Call Report';
    protected static string $resource = UserResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverviewWidget::class
        ];
    }
    protected static string $view = 'filament.resources.user-resource.pages.employee-calls';
}
