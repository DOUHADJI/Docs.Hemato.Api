<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Process;
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
use App\Filament\Resources\ProcessResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProcessResource\RelationManagers;

class ProcessResource extends Resource
{
    protected static ?string $model = Process::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document-check';
    protected static ?string $navigationLabel = "Procédures";
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?string $label = 'Liste des procédures';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("")->schema([

                    Select::make("step_id")
                        ->label("Etape analytique")
                        ->relationship("step", "name"),

                    FileUpload::make("image_path")
                        ->label("Photo de couverture")
                        ->nullable(),

                    FileUpload::make("video_path")
                        ->label("Vidéo de démonstration")
                        ->nullable()
                        ->columnSpan(2),


                    TextInput::make('slug')->label("Slug de la procédure")->required(),

                    TextInput::make("title")
                        ->label("Titre dela procédure")
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (Set $set, $state) {
                            $set("slug", Str::slug($state));
                        })
                        ->required()
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
                TextColumn::make("title")->label("Titre de la procédure")
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label(""),
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
            'index' => Pages\ListProcesses::route('/'),
            'create' => Pages\CreateProcess::route('/create'),
            'edit' => Pages\EditProcess::route('/{record}/edit'),
        ];
    }



    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


    // public function mutateDataBeforeSaving() {}
}
