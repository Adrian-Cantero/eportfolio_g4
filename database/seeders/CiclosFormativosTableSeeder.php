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
                'familia_profesional_id' => $familias[$ciclo['codFamilia']],
                'nombre' => $ciclo['nombre'],
                'codigo' => $ciclo['codCiclo'],
                'grado'  => $ciclo['grado']
            ]);
        }

        $this->command->info('Tabla ciclos_formativos inicializada con datos');
    }


    public static $ciclos = [

        ['codFamilia'=>'ADG','grado'=>'medio','codCiclo'=>'ACEC2','nombre'=>'Técnico en Actividades Ecuestres'],
        ['codFamilia'=>'ADG','grado'=>'superior','codCiclo'=>'ACFI3','nombre'=>'Técnico Superior en Acondicionamiento Físico'],
        ['codFamilia'=>'ADG','grado'=>'basico','codCiclo'=>'ACID1','nombre'=>'Profesional Básico en Acceso y Conservación en Instalaciones Deportivas'],
        ['codFamilia'=>'ADG','grado'=>'superior','codCiclo'=>'EASO3','nombre'=>'Técnico Superior en Enseñanza y Animación Sociodeportiva'],
        ['codFamilia'=>'ADG','grado'=>'medio','codCiclo'=>'GMTL2','nombre'=>'Técnico en Guía en el Medio Natural y de Tiempo Libre'],

        ['codFamilia'=>'AFD','grado'=>'superior','codCiclo'=>'ADFI3','nombre'=>'Técnico Superior en Administración y Finanzas'],
        ['codFamilia'=>'AFD','grado'=>'superior','codCiclo'=>'ASDI3','nombre'=>'Técnico Superior en Asistencia a la Dirección'],
        ['codFamilia'=>'AFD','grado'=>'medio','codCiclo'=>'GADM2','nombre'=>'Técnico en Gestión Administrativa'],
        ['codFamilia'=>'AFD','grado'=>'basico','codCiclo'=>'INOF1','nombre'=>'Profesional Básico en Informática de Oficina'],
        ['codFamilia'=>'AFD','grado'=>'basico','codCiclo'=>'SEAD1','nombre'=>'Profesional Básico en Servicios Administrativos'],

        ['codFamilia'=>'IFC','grado'=>'superior','codCiclo'=>'ASIR3','nombre'=>'Técnico Superior en Administración de Sistemas Informáticos en Red'],
        ['codFamilia'=>'IFC','grado'=>'superior','codCiclo'=>'DAPM3','nombre'=>'Técnico Superior en Desarrollo de Aplicaciones Multiplataforma'],
        ['codFamilia'=>'IFC','grado'=>'superior','codCiclo'=>'DAPW3','nombre'=>'Técnico Superior en Desarrollo de Aplicaciones Web'],
        ['codFamilia'=>'IFC','grado'=>'medio','codCiclo'=>'SMIR2','nombre'=>'Técnico en Sistemas Microinformáticos y Redes'],
        ['codFamilia'=>'IFC','grado'=>'basico','codCiclo'=>'INCO1','nombre'=>'Profesional Básico en Informática y Comunicaciones'],

        ['codFamilia'=>'SAN','grado'=>'superior','codCiclo'=>'ANPAC3','nombre'=>'Técnico Superior en Anatomía Patológica y Citodiagnóstico'],
        ['codFamilia'=>'SAN','grado'=>'superior','codCiclo'=>'HIGBU3','nombre'=>'Técnico Superior en Higiene Bucodental'],
        ['codFamilia'=>'SAN','grado'=>'medio','codCiclo'=>'EMSA2','nombre'=>'Técnico en Emergencias Sanitarias'],
        ['codFamilia'=>'SAN','grado'=>'medio','codCiclo'=>'FAPA2','nombre'=>'Técnico en Farmacia y Parafarmacia'],

        ['codFamilia'=>'SSC','grado'=>'superior','codCiclo'=>'EDIN3','nombre'=>'Técnico Superior en Educación Infantil'],
        ['codFamilia'=>'SSC','grado'=>'medio','codCiclo'=>'PESD2','nombre'=>'Técnico en Atención a Personas en Situación de Dependencia'],
        ['codFamilia'=>'SSC','grado'=>'superior','codCiclo'=>'INSO3','nombre'=>'Técnico Superior en Integración Social'],
    ];
}
