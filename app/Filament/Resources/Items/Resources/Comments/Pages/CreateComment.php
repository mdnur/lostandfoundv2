<?php

namespace App\Filament\Resources\Items\Resources\Comments\Pages;

use App\Filament\Resources\Items\Resources\Comments\CommentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateComment extends CreateRecord
{
    protected static string $resource = CommentResource::class;
}
