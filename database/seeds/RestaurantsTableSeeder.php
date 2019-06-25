<?php

use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            'name' => 'Nous Châteaudun',
            'address' => '8 Rue de Châteaudun',
            'zipCode'=> 75009,
            'city'=> 'Paris',
            'latitude'=>48.8759428,
            'longitude'=> 2.3413613,
            'schedule'=>'Du lundi au vendredi de 12h00 à 14h30 et de 19h à 20h',
            'typeOfFood'=> 'Cuisine du monde',
            'phoneNumber'=>950515882,
            'photo'=>'Nouschâteaudun.jpg',
            'description'=>'Cuisine du monde (burritos, bentos, burgers) diététique, cocktails à base de fruits pressés et vins naturels.'

        ]);

        DB::table('restaurants')->insert([
            'name' => 'Le Cent Huit',
            'address' => '4 Impasse de Joinville',
            'zipCode'=> 75019,
            'city'=> 'Paris',
            'latitude'=>48.8911,
            'longitude'=> 2.3782599999999547,
            'schedule'=>'Du lundi au samedi de 8h00 à 22h et le dimanche de 8h à 19h',
            'typeOfFood'=> 'Français',
            'phoneNumber'=>140374646,
            'photo'=>'LeCentHuit.jpg',
            'description'=>'Véranda et mur d\'accent rose bonbon pour ce restaurant lumineux doublé d\'une librairie, avec événements.'

        ]);

        DB::table('restaurants')->insert([
            'name' => 'Nous Paradis',
            'address' => '16 Rue de Paradis',
            'zipCode'=> 75010,
            'city'=> 'Paris',
            'latitude'=>48.8748,
            'longitude'=> 2.353810000000067,
            'schedule'=>'Du lundi au dimanche de 12h30 à 14h30 et de 19 à 22h30',
            'typeOfFood'=> 'Français',
            'phoneNumber'=>980927210,
            'photo'=>'NousParadis.jpg',
            'description'=>'Viandes françaises et fruits et légumes bio pour cette adresse au look naturel brut et au menu de street food.'

        ]);

        DB::table('restaurants')->insert([
            'name' => 'Health Inside',
            'address' => '30 Rue Charlot ',
            'zipCode'=>75003,
            'city'=> 'Paris',
            'latitude'=>48.8624,
            'longitude'=> 2.362129999999979,
            'schedule'=>'Du lundi au dimanche de 10h à 22h',
            'typeOfFood'=> 'Bio',
            'phoneNumber'=>142781881,
            'photo'=>'HealthInside.jpg',
            'description'=>'Ce restaurant contemporain à l\'ambiance jazzy sert une cuisine bio, détox, végétarienne et végétalienne.'

        ]);
        DB::table('restaurants')->insert([
            'name' => 'PH7 Equilibre',
            'address' => '21 Rue le Peletier ',
            'zipCode'=>75009,
            'city'=> 'Paris',
            'latitude'=>48.8729435,
            'longitude'=> 2.338512,
            'schedule'=>'Du lundi au samedi de 11h à 15h',
            'typeOfFood'=> 'Bio',
            'phoneNumber'=>983879595,
            'photo'=>'PH7Equilibre.jpg',
            'description'=>'Cuisine bio et végétarienne en équilibre acido-basique. Produits de saison et murs ornés de fleurs géantes.'

        ]);

        DB::table('restaurants')->insert([
            'name' => 'Le Bichat',
            'address' => '11 Rue Bichat ',
            'zipCode'=>75010,
            'city'=> 'Paris',
            'latitude'=>48.870250,
            'longitude'=> 2.368740,
            'schedule'=>'Du lundi au dimanche de 9h à 23h',
            'typeOfFood'=> 'Bio Scandinave',
            'phoneNumber'=>954276897,
            'photo'=>'LeBichat.jpg',
            'description'=>'Cuisine bio, sans gluten et plats végétariens/végétaliens dans une salle claire à l\'esprit scandinave.'

        ]);


    }
}
