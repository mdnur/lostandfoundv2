<?php

namespace App\Filament\Resources\Items\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Select::make('type')
                    ->options(['Lost' => 'Lost', 'Found' => 'Found'])
                    ->required(),
                TextInput::make('item_name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('category_id')
                    ->required()
                    ->numeric(),
                TextInput::make('location_id')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options(['Active' => 'Active', 'Resolved' => 'Resolved'])
                    ->default('Active')
                    ->required(),
                DateTimePicker::make('reported_at')
                    ->required(),
            ]);
    }
}
