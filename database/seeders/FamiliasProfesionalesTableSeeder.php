<?php

namespace Database\Seeders;

use App\Models\FamiliaProfesional;
use Illuminate\Database\Seeder;

class FamiliasProfesionalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FamiliaProfesional::truncate();

        foreach (self::$familias_profesionales as $familia) {
            FamiliaProfesional::create([
                'codigo' => $familia['codigo'],
                'nombre' => $familia['nombre']
            ]);
        }

        $this->command->info('Tabla familias_profesionales inicializada con datos');
    }

    public static $familias_profesionales = [
        ['codigo' => 'ADG','nombre' => 'ACTIVIDADES FÍSICAS Y DEPORTIVAS'],
        ['codigo' => 'AFD','nombre' => 'ADMINISTRACIÓN Y GESTIÓN'],
        ['codigo' => 'AGA','nombre' => 'AGRARIA'],
        ['codigo' => 'ARA','nombre' => 'ARTES Y ARTESANÍAS'],
        ['codigo' => 'ARG','nombre' => 'ARTES GRÁFICAS'],
        ['codigo' => 'COM','nombre' => 'COMERCIO Y MARKETING'],
        ['codigo' => 'ELE','nombre' => 'ELECTRICIDAD Y ELECTRÓNICA'],
        ['codigo' => 'ENA','nombre' => 'ENERGÍA Y AGUA'],
        ['codigo' => 'EOC','nombre' => 'EDIFICACIÓN Y OBRA CIVIL'],
        ['codigo' => 'FME','nombre' => 'FABRICACIÓN MECÁNICA'],
        ['codigo' => 'HOT','nombre' => 'HOSTELERÍA Y TURISMO'],
        ['codigo' => 'IEX','nombre' => 'INDUSTRIAS EXTRACTIVAS'],
        ['codigo' => 'IFC','nombre' => 'INFORMÁTICA Y COMUNICACIONES'],
        ['codigo' => 'IMA','nombre' => 'INSTALACIÓN Y MANTENIMIENTO'],
        ['codigo' => 'IMP','nombre' => 'IMAGEN PERSONAL'],
        ['codigo' => 'IMS','nombre' => 'IMAGEN Y SONIDO'],
        ['codigo' => 'INA','nombre' => 'INDUSTRIAS ALIMENTARIAS'],
        ['codigo' => 'MAM','nombre' => 'MADERA, MUEBLE Y CORCHO'],
        ['codigo' => 'MAP','nombre' => 'MARÍTIMO-PESQUERA'],
        ['codigo' => 'QUI','nombre' => 'QUÍMICA'],
        ['codigo' => 'SAN','nombre' => 'SANIDAD'],
        ['codigo' => 'SEA','nombre' => 'SEGURIDAD Y MEDIO AMBIENTE'],
        ['codigo' => 'SSC','nombre' => 'SERVICIOS SOCIOCULTURALES Y A LA COMUNIDAD'],
        ['codigo' => 'TCP','nombre' => 'TEXTIL, CONFECCIÓN Y PIEL'],
        ['codigo' => 'TMV','nombre' => 'TRANSPORTE Y MANTENIMIENTO DE VEHÍCULOS'],
        ['codigo' => 'VIC','nombre' => 'VIDRIO Y CERÁMICA'],
    ];
}
