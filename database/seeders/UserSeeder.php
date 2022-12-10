<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            ['name' => 'admin', 'email' => 'admin', 'password' => bcrypt('administrador')],
            ['name' => 'APAZA COILA IRVING DANIEL', 'email' => '70847281', 'password' => bcrypt('143959')],
            ['name' => 'ARCE CONDORI MICHAEL RODRIGO', 'email' => '70202342', 'password' => bcrypt('180576')],
            ['name' => 'ARGAMA PAYE LUIS JOSHELIM', 'email' => '74168336', 'password' => bcrypt('093693')],
            ['name' => 'ARPI ROQUE YANETH', 'email' => '71719631', 'password' => bcrypt('180973')],
            ['name' => 'BARRAZA CAMPOS ANGEL MANUEL', 'email' => '70135018', 'password' => bcrypt('181124')],
            ['name' => 'BUSTINZA NUÑEZ JHON ANTHONY', 'email' => '70296995', 'password' => bcrypt('131746')],
            ['name' => 'CABANA MAMANI MIGUEL ARNALDO', 'email' => '70094790', 'password' => bcrypt('180577')],
            ['name' => 'CAIRA MAMANI RONALD JOSE', 'email' => '72308594', 'password' => bcrypt('180578')],
            ['name' => 'CARI CALLATA JOSE LUIS', 'email' => '74633300', 'password' => bcrypt('181897')],
            ['name' => 'CHAMBILLA CHOQUECOTA DRAKE LEONEL', 'email' => '76187391', 'password' => bcrypt('181986')],
            ['name' => 'CHARCA HIDALGO HEBERT JOSHEP', 'email' => '70127493', 'password' => bcrypt('153327')],
            ['name' => 'MAYTA CCASO EUDES RAMIRO', 'email' => '70979953', 'password' => bcrypt('181826')],
            ['name' => 'GUILLEN LUQUE RYGAN KENYO', 'email' => '70235725', 'password' => bcrypt('135392')],
            ['name' => 'ROQUE YUCRA MIGUEL ANGEL', 'email' => '74705399', 'password' => bcrypt('174381')],
            ['name' => 'GOMEZ CALIZAYA KEPHLER', 'email' => '70277376', 'password' => bcrypt('161594')],
            ['name' => 'MAMANI MAMANI JHULISA SHARMELLY', 'email' => '75863799', 'password' => bcrypt('181348')],
            ['name' => 'TAPIA RAMOS ARTURO EYCK', 'email' => '72775179', 'password' => bcrypt('181408')],
            ['name' => 'RAMOS FLORES ARHYEL PHILIPPE', 'email' => '75689326', 'password' => bcrypt('181884')],
            ['name' => 'ZUÑIGA ARIAS ZARUFZABE RENATO', 'email' => '71441848', 'password' => bcrypt('181199')],
            ['name' => 'TACO AVILES MILTON HIROSHI', 'email' => '72463008', 'password' => bcrypt('181178')],
            ['name' => 'MAMANI LARICO MARINELA GLADYS', 'email' => '71595000', 'password' => bcrypt('180581')],
            ['name' => 'MAMANI GONZALO JHOSELYN YENIDA', 'email' => '76843472', 'password' => bcrypt('180184')],
            ['name' => 'PARI ILLANES KAREN ANYELA', 'email' => '70111032', 'password' => bcrypt('174832')],
            ['name' => 'VENTURA CONDORI CLINTON KENEDY', 'email' => '74947760', 'password' => bcrypt('181134')],
        ];


        foreach($users as $user){
            User::create($user);
        }

        // 171663	73525858	CAMPOS ALVAREZ LIZETH
        // 171088	70221727	CCORI ARAGON ERICK GONZALO
        // 092318	70244547	CHAIÑA DEL CASTILLO JHERSSON ERNESTO
        // 174864	71430477	CHARCA QUISPE RONAL
        // 153154	70269453	CHOQUEHUANCA CACERES WILIAN ADRIAN
        // 181906	71824090	CHURA CHURA OLINDA DANITZA
        // 120285	71046678	CHURA CRUZ ROY MODES
        // 140832	72865330	COILA TICONA JEHAN CARLOS
        // 181759	73033039	CUSI JUSTO CESAR CLAUDIO
        // 154159	78378359	ESPINOZA CASTILLO EDHER
        // 181185	74651116	FLORES ILACOPA LEIDA IDALECIA
        // 181895	71052981	GOMEZ ALANOCA JOEL SANTOS
        // 181093	76138395	GUZMAN TULA JOSE EDUARDO
        // 141191	70756159	HUANCA GUERRA JOHN CARLOS
        // 174389	76233005	HUARAYA AMANQUI SILVANA YANETH
        // 170632	73744393	HUAYNAPATA UCHARICO FREDDY WALTER
        // 163111	71027461	INCACUTIPA HUARACHI WALTER BERNABE
        // 181936	71657437	LEON CHIPANA WILLIAM WILBER
        // 164456	76541031	LIMA CECENARDO JESUS ORLANDO


        // 174386	72471491	MAMANI LOPEZ, JULIO ELIAS
        // 174402	73777406	MAMANI SONCCO LISSBETH RUDY
        // 174401	77168808	MAQUERA ARACA LUZ PILAR
        // 135461	45241201	MERMA VILCA YESSICA VERONICA
        // 123531	73821223	MULLUNI GONZALES JUAN CARLOS

        // 160878	70379898	PAURO VELASQUEZ CHRISTIAN GABINO
        // 150586	48892724	PUMA HUACASI HEBERT YURI
        // 175492	74309459	QUISPE GUTIERREZ ABRAHAM EINSTEIN
        // 142845	73352473	QUISPE MAMANI YONY SADAN
        // 170237	74600166	QUISPE QUISPE WALDIR RIVALDO

        // 180583	72872001	RAMOS HALANOCA CRISTIAN REYSCELL
        // 102123	72737934	ROSAS CEREZO LUIS MIGUEL
        // 160125	74624281	SACARI HUERTA WILSON RENE
        // 181143	74835757	SALAZAR CUTIPA JUAN MIJAEL
        // 134286	73651882	SANGA CHAHUA JOSE FREDY
        // 160403	74074397	SARDON CUTIPA CARLOS ROBERTO

        // 181163	70977160	TALIZO CHAMBILLA MIGUEL ANGEL
        // 174390	70817529	TAPARA CANSAYA DENNIS HENRY


        // 162041	77381979	VILLASANTE DEL CARPIO MARCELO ATILIO
        // 122128	48157560	YANCAPALLO MANUEL JOEL MARCOS
        // 171218	71568784	YUCRA MENDOZA ANGEL GABRIEL

    }
}
