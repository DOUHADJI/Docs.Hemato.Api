<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use App\Models\WeekCase;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Helpers\FilamentNotificationMessages;
use App\Filament\Resources\WeekCaseResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\WeekCaseResource\RelationManagers;

class WeekCaseResource extends Resource
{
    protected static ?string $model = WeekCase::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = "Cas de la semaine";
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?string $label = "Liste des Cas de la semaine";



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("")->schema([



                    FileUpload::make("image_path")
                        ->label("Photo de couverture")
                        ->nullable(),

                    TextInput::make("video_path")
                        ->label("Url de la vidéo de démonstration")
                        ->nullable()
                        ->columnSpan(2),

                    TextInput::make("title")
                        ->label("Titre du cas de la semaine")
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (Set $set, $state) {
                            $set("slug", Str::slug($state));
                        })
                        ->required()
                        ->columnSpan(2),

                    TextInput::make('slug')->label("Slug du cas de la semaine")->required(),

                    Textarea::make('resume')
                        ->label("Resume du cas de la semaine")
                        ->required()
                        ->rows(6)
                        ->columnSpan(2),



                    RichEditor::make('content')
                        ->label("contenu")
                        ->columnSpan(2)
                        ->required()
                ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("title")->label("Titre du cas de la semaine")
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label("")->successNotificationTitle(FilamentNotificationMessages::successEditNotification()),
                Tables\Actions\DeleteAction::make()->label("")->successNotificationTitle(FilamentNotificationMessages::successDeleteNotification()),
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
            'index' => Pages\ListWeekCases::route('/'),
            'create' => Pages\CreateWeekCase::route('/create'),
            'edit' => Pages\EditWeekCase::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
