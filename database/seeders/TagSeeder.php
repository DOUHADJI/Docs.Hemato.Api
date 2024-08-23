<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            "Laboratoires d'analyses",
            "Documentation médicale",
            "Hématologie",
            "Processus de laboratoire",
            "Répertoire de méthodologies",
            "Manuel qualité",
            "Norme ISO 15189:2012",
            "Santé au Togo",
            "Formation médicale",
            "Référence médicale",
            "Méthodologies en hématologie",
            "Qualité des soins",
            "Santé publique",
            "Laboratoires de santé",
            "Protocole de laboratoire",
            "Normes médicales",
            "Procédures médicales",
            "Analyse biomédicale",
            "Processus médicaux",
            "Documentation de processus"
        ];

        foreach($tags as $tag)
        {
            $model = new Tag();
            $model->name = $tag;
            $model->slug = Str::slug($tag);
            $model->save();
        }

    }
}
