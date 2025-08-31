<?php

namespace App\Filament\Resources\Items\Resources\Comments;

use App\Filament\Resources\Items\ItemResource;
use App\Filament\Resources\Items\Resources\Comments\Pages\CreateComment;
use App\Filament\Resources\Items\Resources\Comments\Pages\EditComment;
use App\Filament\Resources\Items\Resources\Comments\Schemas\CommentForm;
use App\Filament\Resources\Items\Resources\Comments\Tables\CommentsTable;
use App\Models\Comment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $parentResource = ItemResource::class;

    protected static ?string $recordTitleAttribute = 'Comment';

    public static function form(Schema $schema): Schema
    {
        return CommentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CommentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'create' => CreateComment::route('/create'),
            'edit' => EditComment::route('/{record}/edit'),
        ];
    }
}
