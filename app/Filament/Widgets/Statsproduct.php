<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class Statsproduct extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Orders', Order::count())
    ->description('Total pesanan yang masuk')
    ->descriptionIcon('heroicon-o-shopping-bag')
    ->chart([7, 3, 4, 5, 6, 8, 10])
    ->color('primary')
    ->extraAttributes([
        'class' => 'border-t-4 border-primary-500 shadow-lg hover:shadow-xl transition-all',
    ]),

Card::make('Total Products', Product::count())
    ->description('Jumlah produk terdaftar')
    ->descriptionIcon('heroicon-o-shopping-cart')
    ->chart([2, 4, 6, 8, 10, 12, 14])
    ->icon('heroicon-o-cube')
    ->color('success')
    ->extraAttributes([
        'class' => 'border-t-4 border-success-500 shadow-lg hover:shadow-xl transition-all',
    ]),

Card::make('Total Users', User::count())
    ->description('Jumlah pengguna')
    ->descriptionIcon('heroicon-o-users')
    ->chart([5, 10, 15, 20, 25, 30, 35])
    ->icon('heroicon-o-user-group')
    ->color('warning')
    ->extraAttributes([
        'class' => 'border-t-4 border-warning-500 shadow-lg hover:shadow-xl transition-all',
    ]),
        ];
    }
}
