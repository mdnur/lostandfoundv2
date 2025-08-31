<?php

namespace App\Filament\Resources\Items\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('type')
                    ->options(['Lost' => 'Lost', 'Found' => 'Found'])
                    ->required(),
                TextInput::make('item_name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),

                Select::make('category_id')
                    ->relationship(name: 'category', titleAttribute: 'category_name')
                    ->required(),

                Select::make('location_id')
                    ->relationship(name: 'location', titleAttribute: 'location_name')
                    ->required(),

                Select::make('status')
                    ->options(['Active' => 'Active', 'Resolved' => 'Resolved'])
                    ->default('Active')
                    ->required(),
                DateTimePicker::make('reported_at')
                    ->native(false)
                    ->default(now())
                    ->required(),
            ]);
    }
}
