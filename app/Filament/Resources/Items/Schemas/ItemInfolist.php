<?php

namespace App\Filament\Resources\Items\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ItemInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('type'),
                TextEntry::make('item_name'),
                TextEntry::make('category_id')
                    ->numeric(),
                TextEntry::make('location_id')
                    ->numeric(),
                TextEntry::make('status'),
                TextEntry::make('reported_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
