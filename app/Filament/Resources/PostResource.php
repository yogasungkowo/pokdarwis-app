<?php

namespace App\Filament\Resources;

use Dom\Text;
use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;
use Filament\Tables\Columns\TextColumn;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationGroup = 'Article';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)
                    ->schema([
                        FileUpload::make('image')
                            ->label('Featured Image')
                            ->image()
                            ->required()
                            ->disk('public')
                            ->directory('posts/images')
                            ->visibility('public')
                            ->preserveFilenames()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('1920')
                            ->imageResizeTargetHeight('1080')
                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg', 'image/gif'])
                            ->panelAspectRatio('16:9'),
                        TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (?string $state, callable $set) {
                                if ($state) {
                                    $set('slug', Str::slug($state));
                                }
                            }),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->disabled()
                            ->dehydrated(),
                        Forms\Components\Select::make('categories')
                            ->relationship('categories', 'name')
                            ->required()
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $state, callable $set) {
                                        $set('slug', Str::slug($state));
                                    }),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->disabled()
                                    ->dehydrated(),
                            ]),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published'),
                        Forms\Components\Hidden::make('user_id')
                            ->default(fn () => Auth::id()),
                    ]),
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\Textarea::make('content')
                            ->label('Konten')
                            ->rows(10)
                            ->required()
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Author')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('is_published')
                    ->label('Published')
                    ->formatStateUsing(fn ($state) => $state
                        ? '<span style="color:green;">&#10003;</span>'
                        : '<span style="color:red;">&#10007;</span>')
                    ->html(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('is_published')
                    ->label('Published')
                    ->query(fn (Builder $query) => $query->where('is_published', true))
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation()
                ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}

