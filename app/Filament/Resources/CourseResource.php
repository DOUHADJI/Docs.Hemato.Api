<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Course;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Helpers\FilamentNotificationMessages;
use App\Filament\Resources\CourseResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CourseResource\RelationManagers;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = "Cours";
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?string $label = "Liste des Cours";


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("")->schema([

                    Select::make("thematic_id")
                        ->label("Thematique du cours")
                        ->relationship("thematic", "name"),

                    FileUpload::make("image_path")
                        ->label("Photo de couverture")
                        ->nullable(),

                    TextInput::make("video_path")
                        ->label("Vidéo de démonstration")
                        ->nullable()
                        ->columnSpan(2),

                    TextInput::make("title")
                        ->label("Titre dela procédure")
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (Set $set, $state) {
                            $set("slug", Str::slug($state));
                        })
                        ->required()
                        ->columnSpan(2),

                    TextInput::make('slug')->label("Slug du cours")->required(),



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
                TextColumn::make("title")->label("Titre du cours")
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label("")->successNotificationTitle(FilamentNotificationMessages::successEditNotification()) ,
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }



    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
