<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Images;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->users();

        $this->announcements();


    }

    public function users()
    {
        \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'is_admin' => 1,
            'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
        ]);
        Artisan::call('presto:makeUserRevisor', ['email' => 'admin@example.com']);

        \App\Models\User::create([
            'name' => 'User1',
            'is_revisor' => 1,
            'email' => 'user1@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678'),

        ]);

        \App\Models\User::create([
            'name' => 'User2',
            'email' => 'user2@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678'),

        ]);

    }

    public function announcements()
    {
        \App\Models\Announcement::create([
            'user_id' => 1,
            'category_id' => 2,
            'title' => 'Tv curved samsung',
            'body' => 'Tv samsung in vendita 49” curvo.
            Il tv si presenta in buono stato. Come si vede nelle foto, peró, l’immagine e rovinata nel punto dove e presente la riga
            Prezzo trattabile.',
            'price' => 450,
            'created_at' => '2023-08-10 19:30:51',
            'is_accepted' => 1,
        ]);

        Images::create([
            'path' => 'imgAnnunci\1.jpeg',
            'announcement_id' => 1,
            ]);

            Images::create([
                'path' => 'imgAnnunci\2.jpeg',
                'announcement_id' => 1,
                ]);

                Images::create([
                    'path' => 'imgAnnunci\3.jpeg',
                    'announcement_id' => 1,
                    ]);

        \App\Models\Announcement::create([
            'user_id' => 2,
            'category_id' => 2,
            'title' => 'Tv lg 55 pollici oled 4k',
            'body' => 'Vendo nuovissima tv lg 55 pollici oled 4k
            Usata poco perchè era in una seconda casa
            Prezzo 200€',
            'price' => 200,
            'created_at' => '2023-08-10 19:31:52',
            'is_accepted' => 1,
        ]);

        Images::create([
            'path' => 'imgAnnunci\4.jpeg',
            'announcement_id' => 2,
            ]);

            Images::create([
                'path' => 'imgAnnunci\5.jpeg',
                'announcement_id' => 2,
                ]);

                Images::create([
                    'path' => 'imgAnnunci\6.jpeg',
                    'announcement_id' => 2,
                    ]);

        \App\Models\Announcement::create([
            'user_id' => 1,
            'category_id' => 2,
            'title' => 'Pc gaming',
            'body' => 'Vendo pc gaming

            Rtx 2070
            Ryzen 7 5800x
            16gb ram 3200mhz
            B450-f rog strix
            120gb ssd
            500gb hdd
            750w coolermaster
            Case corsair 4000d air flow comprato nuovo
            Mouse logitech 203g
            Tastiera drevo bluswitch
            Monitor 75hz 27 pollici

            Tutto a 850
            Prezzo poco trattabile

            Volendo posso vendere solo il pc a soli 700€ non meno',
            'price' => 700,
            'created_at' => '2023-08-10 19:32:53',
            'is_accepted' => 1,
        ]);

        Images::create([
            'path' => 'imgAnnunci\7.jpeg',
            'announcement_id' => 3,
            ]);

            Images::create([
                'path' => 'imgAnnunci\8.jpeg',
                'announcement_id' => 3,
                ]);


        \App\Models\Announcement::create([
            'user_id' => 3,
            'category_id' => 2,
            'title' => 'PC Gaming / Editing RTX 2070 Super',
            'body' => 'Vendo PC Fisso assemblato nel 2019, con i seguenti componenti:

            Scheda video: RTX 2070 Super Gigabyte Windforce OC 3X 8gb

            Scheda madre: MSI MPG Z390 GAMING PRO CARBON + Antenna WiFi

            Storage: SSD 500GB NVMe M.2 Samsung 970 EVO Plus + HDD 1TB

            RAM: Corsair Vengeance LPX 32GB DDR4-3200 (2 x 16gb)

            Processore: Intel i5 8600K

            Alimentatore: Corsair VS650 da 650W

            Dissipatore: ARCTIC Freezer 13 200W Ventola 92mm

            Case: Noua Nexus P4 Black ATX + 3x Ventole Noua Lips Black PWM 16 LED RGB

            Periferiche: Tastiera + Mouse VicTsing RGB

            Performance ottime, utilizzato con Suite Adobe e programmi di rendering/modellazione 3D (OnShape, Keyshot, Blender).

            Valuto anche scambi con MacBook Pro M1, con differenza in base alle specs.',
            'price' => 675,
            'created_at' => '2023-08-10 19:33:54',
            'is_accepted' => 1,
        ]);

        Images::create([
            'path' => 'imgAnnunci\11.jpeg',
            'announcement_id' => 4,
            ]);

            Images::create([
                'path' => 'imgAnnunci\9.jpeg',
                'announcement_id' => 4,
                ]);

                Images::create([
                    'path' => 'imgAnnunci\10.png',
                    'announcement_id' => 4,
                    ]);

        \App\Models\Announcement::create([
            'user_id' => 2,
            'category_id' => 3,
            'title' => 'Lavatrice BEKO',
            'body' => 'Vendo Lavatrice come nuova, usata pochissimo.',
            'price' => 150,
            'created_at' => '2023-08-10 19:34:51',
            'is_accepted' => 1,
        ]);

        Images::create([
            'path' => 'imgAnnunci\12.jpeg',
            'announcement_id' => 5,
            ]);

            Images::create([
                'path' => 'imgAnnunci\13.jpeg',
                'announcement_id' => 5,
                ]);

                Images::create([
                    'path' => 'imgAnnunci\14.jpeg',
                    'announcement_id' => 5,
                    ]);

        \App\Models\Announcement::create([
            'user_id' => 3,
            'category_id' => 3,
            'title' => 'Lavatrice Samsung',
            'body' => 'Lavatrice Samsung Digital Inverter vendo per trasferimento, come nuova in perfette condizioni, misure 60x60. Ritiro presso il domicilio.',
            'price' => 380,
            'created_at' => '2023-08-10 19:35:51',
            'is_accepted' => 1,
        ]);

        Images::create([
            'path' => 'imgAnnunci\15.jpeg',
            'announcement_id' => 6,
            ]);

            Images::create([
                'path' => 'imgAnnunci\16.jpeg',
                'announcement_id' => 6,
                ]);

                Images::create([
                    'path' => 'imgAnnunci\17.jpeg',
                    'announcement_id' => 6,
                    ]);

        \App\Models\Announcement::create([
            'user_id' => 2,
            'category_id' => 1,
            'title' => 'FIAT Fiorino 1ª serie - 1999',
            'body' => 'Vendesi Fiat Fiorino 1.7 Turbo diesel allestimento "LUPO" - Alzacristalli anteriori elettrici con chiusura automatica in chiusura veicolo - Allarme sonoro e volumetrico - Servosterzo - Voletto su tetto per carichi speciali. Il veicolo è visionabile presso la Concessionaria PUGLISAUTO SRL. di Piano Tavola',
            'price' => 2500,
            'created_at' => '2023-08-10 19:36:51',
            'is_accepted' => 1,
        ]);

        Images::create([
            'path' => 'imgAnnunci\18.jpeg',
            'announcement_id' => 7,
            ]);

            Images::create([
                'path' => 'imgAnnunci\19.jpeg',
                'announcement_id' => 7,
                ]);

                Images::create([
                    'path' => 'imgAnnunci\20.jpeg',
                    'announcement_id' => 7,
                    ]);




        \App\Models\Announcement::create([
            'user_id' => 3,
            'category_id' => 1,
            'title' => 'Ford Mustang Shelby Gt 500 Coupe 1000PS',
            'body' => 'Ford Mustang Shelby Gt 500 Coupe\'ambiente bracciolo Computer di bordo riproduttore CD Finestrini elettrici Specchietto laterale elettrico Immobilizzatore elettrico Specchio interno autom. oscuramento Volante in pelleLuci diurne a LEDCerchi in lega Volante multifunzionale Fendinebbia Veicolo per non fumatori Controllo della pressione dei pneumatici',
            'price' => 188900,
            'created_at' => '2023-08-10 19:38:51',
            'is_accepted' => 1,
        ]);

        Images::create([
            'path' => 'imgAnnunci\21.jpeg',
            'announcement_id' => 8,
            ]);

            Images::create([
                'path' => 'imgAnnunci\22.jpeg',
                'announcement_id' => 8,
                ]);

                Images::create([
                    'path' => 'imgAnnunci\23.jpeg',
                    'announcement_id' => 8,
                    ]);

        \App\Models\Announcement::create([
            'user_id' => 1,
            'category_id' => 3,
            'title' => 'Audemars Piguet Royal Oak Dual Time 39mm',
            'body' => 'Audemars Piguet
            Royal Oak Dual Time

            Blue dial
            Year 2008
            Extract paper AP
            39 mm
            Vetro zaffiro',
            'price' => 490000,
            'created_at' => '2023-08-10 19:39:51',
            'is_accepted' => 1,
        ]);

        Images::create([
            'path' => 'imgAnnunci\24.jpeg',
            'announcement_id' => 9,
            ]);

            Images::create([
                'path' => 'imgAnnunci\25.jpeg',
                'announcement_id' => 9,
                ]);

                Images::create([
                    'path' => 'imgAnnunci\26.jpeg',
                    'announcement_id' => 9,
                    ]);


        \App\Models\Announcement::create([
            'user_id' => 3,
            'category_id' => 3,
            'title' => 'Rolex Daytona 116509 Crystal Dial 2019 Full Set',
            'body' => 'Rolex Daytona anno 2019 cassa e bracciale oyster
             in oro bianco dimaetro 40mm  ghiera liscia in oro bianco
             con scala tachimetrica al 400  vetro zaffiro quadrante MOP
             Diamond CRYSTAL DIAL  funzione chrono automatico  chiusura
             cinturino fliplock lunga in oro bianco  condizioni ottime.' ,

            'price' => 700000,
            'created_at' => '2023-08-10 19:39:52',
            'is_accepted' => 1,
        ]);

        Images::create([
            'path' => 'imgAnnunci\27.jpeg',
            'announcement_id' => 10,
            ]);

            Images::create([
                'path' => 'imgAnnunci\28.jpeg',
                'announcement_id' => 10,
                ]);

                Images::create([
                    'path' => 'imgAnnunci\29.jpeg',
                    'announcement_id' => 10,
                    ]);

                    \App\Models\Announcement::create([
                        'user_id' => 3,
                        'category_id' => 8,
                        'title' => 'Apple iPhone 14 5G 128GB Nuovo Originale Smartphone NERO Midnight',
                        'body' => 'Nuovo: Oggetto nuovo, non usato, non aperto, non danneggiato, nella confezione originale (ove la confezione sia prevista). La confezione deve essere la stessa disponibile nei negozi, a meno che l\'oggetto non sia fatto a mano o preconfezionato dal produttore in confezioni diverse da quelle destinate ai negozi, come una scatola senza scritte o una busta di plastica. Per maggiori dettagli, consulta l\'inserzione del venditore' ,

                        'price' => 739,
                        'created_at' => '2023-08-10 19:39:52',

                    ]);

                    Images::create([
                        'path' => 'imgAnnunci\30.png',
                        'announcement_id' => 11,
                        ]);

                        Images::create([
                            'path' => 'imgAnnunci\31.png',
                            'announcement_id' => 11,
                            ]);



                                \App\Models\Announcement::create([
                                    'user_id' => 3,
                                    'category_id' => 2,
                                    'title' => 'SONY PLAYSTATION 5 PS5 CONSOLE 825GB BlueRay Disk Edition White NUOVO',
                                    'body' => 'Nuovo: Oggetto nuovo, non usato, non aperto, non danneggiato, nella confezione originale (ove la confezione sia prevista). La confezione deve essere la stessa disponibile nei negozi, a meno che l\'oggetto non sia fatto a mano o preconfezionato dal produttore in confezioni diverse da quelle destinate ai negozi, come una scatola senza scritte o una busta di plastica. Per maggiori dettagli, consulta l\'inserzione del venditore' ,

                                    'price' => 483,
                                    'created_at' => '2023-08-10 19:39:52',

                                ]);

                                Images::create([
                                    'path' => 'imgAnnunci\32.png',
                                    'announcement_id' => 12,
                                    ]);

                                    Images::create([
                                        'path' => 'imgAnnunci\33.png',
                                        'announcement_id' => 12,
                                        ]);

                                        Images::create([
                                            'path' => 'imgAnnunci\34.png',
                                            'announcement_id' => 12,
                                            ]);


                                            \App\Models\Announcement::create([
                                                'user_id' => 3,
                                                'category_id' => 3,
                                                'title' => 'Aspirapolvere Senza Fili, Scopa Elettrica Potente  con Display Touch',
                                                'body' => 'Aspirapolvere Senza Fili, Scopa Elettrica Potente 400W/33000Pa con Display Touch.


                                                1. Con un\'elevata potenza di aspirazione di 33000Pa, adatto a varie scene e soddisfa tutti i requisiti;

                                                La batteria staccabile 2.a fornisce fino A 55 minuti di autonomia;

                                                3. Con un touch screen, fai scorrere la barra di velocità sul display per regolare \'aspirazione;

                                                4. Promemoria blocco schermo per una facile ispezione

                                                e pulizia;

                                                La tazza per la polvere grande da 5,5 litri può contenere più sporco e peli di animali domestici contemporaneamente;

                                                6. Spazzole elettriche a LED e vari accessori per spazzole, forniscono illuminazione e aree cieche pulite;

                                                Sistema di filtraggio a 7.5 stadi con filtro dell\'aria unico per bloccare la polvere da volare fuori e rilasciare l\'aria fresca;

                                                8. Il tubo telescopico con lunghezza regolabile è adatto a

                                                diversi gruppi di persone;

                                                9. Il design di archiviazione a parete può salvarti

                                                più spazio;

                                                10. Il suono operativo Ultra-silenzioso evita il rumore irritante, amichevole per il tuo bambino e animale domestico. Pesare solo 3 libbre si converte facilmente in un palmare.' ,

                                                'price' => 700000,
                                                'created_at' => '2023-08-10 19:39:52',

                                            ]);

                                            Images::create([
                                                'path' => 'imgAnnunci\35.jpeg',
                                                'announcement_id' => 13,
                                                ]);

                                                Images::create([
                                                    'path' => 'imgAnnunci\36.jpeg',
                                                    'announcement_id' => 13,
                                                    ]);

                                                    Images::create([
                                                        'path' => 'imgAnnunci\37.jpeg',
                                                        'announcement_id' => 13,
                                                        ]);

    }
}
