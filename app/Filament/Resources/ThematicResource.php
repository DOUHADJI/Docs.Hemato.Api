<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use App\Models\Thematic;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Helpers\FilamentNotificationMessages;
use App\Filament\Resources\ThematicResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ThematicResource\RelationManagers;

class ThematicResource extends Resource
{
    protected static ?string $model = Thematic::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = "Thématiques de cours";
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $label = "Liste des Thématiques de cours";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("")->schema([

                    TextInput::make("name")
                        ->label("Nom de la thématique")
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (Set $set, $state) {
                            $set("slug", Str::slug($state));
                        })
                        ->required()
                        ,

                    TextInput::make('slug')->label("Slug de la thématique")->required(),

                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("name")->label("Nom de la thématique"),
                TextColumn::make("slug")->label("Slug de la thématique"),
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
            'index' => Pages\ListThematics::route('/'),
         //   'create' => Pages\CreateThematic::route('/create'),
          //  'edit' => Pages\EditThematic::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
