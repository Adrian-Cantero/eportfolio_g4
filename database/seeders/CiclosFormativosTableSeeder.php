<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CicloFormativo;
use App\Models\FamiliaProfesional;

class CiclosFormativosTableSeeder extends Seeder
{
    public function run(): void
    {
        CicloFormativo::truncate();
        $familias = FamiliaProfesional::pluck('id', 'codigo');

        foreach (self::$ciclos as $ciclo) {

            if (!isset($familias[$ciclo['codFamilia']])) {
                continue;
            }

            CicloFormativo::create([
                'nombre' => $ciclo['nombre'],
                'codigo' => $ciclo['codCiclo'],
                'grado'  => $ciclo['grado']
            ]);
        }

        $this->command->info('Tabla ciclos-formativos inicializada con datos');
    }


    public static $ciclos = [

        ['grado'=>'medio','codCiclo'=>'ACEC2','nombre'=>'Técnico en Actividades Ecuestres'],
        ['grado'=>'superior','codCiclo'=>'ACFI3','nombre'=>'Técnico Superior en Acondicionamiento Físico'],
        ['grado'=>'basico','codCiclo'=>'ACID1','nombre'=>'Profesional Básico en Acceso y Conservación en Instalaciones Deportivas'],
        ['grado'=>'superior','codCiclo'=>'EASO3','nombre'=>'Técnico Superior en Enseñanza y Animación Sociodeportiva'],
        ['grado'=>'medio','codCiclo'=>'GMTL2','nombre'=>'Técnico en Guía en el Medio Natural y de Tiempo Libre'],

        ['grado'=>'superior','codCiclo'=>'ADFI3','nombre'=>'Técnico Superior en Administración y Finanzas'],
        ['grado'=>'superior','codCiclo'=>'ASDI3','nombre'=>'Técnico Superior en Asistencia a la Dirección'],
        ['grado'=>'medio','codCiclo'=>'GADM2','nombre'=>'Técnico en Gestión Administrativa'],
        ['grado'=>'basico','codCiclo'=>'INOF1','nombre'=>'Profesional Básico en Informática de Oficina'],
        ['grado'=>'basico','codCiclo'=>'SEAD1','nombre'=>'Profesional Básico en Servicios Administrativos'],

        ['grado'=>'superior','codCiclo'=>'ASIR3','nombre'=>'Técnico Superior en Administración de Sistemas Informáticos en Red'],
        ['grado'=>'superior','codCiclo'=>'DAPM3','nombre'=>'Técnico Superior en Desarrollo de Aplicaciones Multiplataforma'],
        ['grado'=>'superior','codCiclo'=>'DAPW3','nombre'=>'Técnico Superior en Desarrollo de Aplicaciones Web'],
        ['grado'=>'medio','codCiclo'=>'SMIR2','nombre'=>'Técnico en Sistemas Microinformáticos y Redes'],
        ['grado'=>'basico','codCiclo'=>'INCO1','nombre'=>'Profesional Básico en Informática y Comunicaciones'],

        ['grado'=>'superior','codCiclo'=>'ANPAC3','nombre'=>'Técnico Superior en Anatomía Patológica y Citodiagnóstico'],
        ['grado'=>'superior','codCiclo'=>'HIGBU3','nombre'=>'Técnico Superior en Higiene Bucodental'],
        ['grado'=>'medio','codCiclo'=>'EMSA2','nombre'=>'Técnico en Emergencias Sanitarias'],
        ['grado'=>'medio','codCiclo'=>'FAPA2','nombre'=>'Técnico en Farmacia y Parafarmacia'],

        ['grado'=>'superior','codCiclo'=>'EDIN3','nombre'=>'Técnico Superior en Educación Infantil'],
        ['grado'=>'medio','codCiclo'=>'PESD2','nombre'=>'Técnico en Atención a Personas en Situación de Dependencia'],
        ['grado'=>'superior','codCiclo'=>'INSO3','nombre'=>'Técnico Superior en Integración Social'],
    ];
}
