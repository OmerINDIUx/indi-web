<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = [
            // INFRAESTRUCTURA (64b032) - Categoría 1
            [
              "id" => 1,
              "title" => "Aeropuerto Internacional Ángel Albino Corzo",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/Centro-de-Congresos-de-Huatulco - copia.jpg",
              "address" => "Chiapas",
              "latitude" => "16.559170",
              "longitude" => "-93.023090"
            ],
            [
              "id" => 25,
              "title" => "Calzada Flotante",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/infraestructura/Calzada-Flotante-CDMX - copia.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.421385",
              "longitude" => "-99.194375"
            ],
            [
              "id" => 39,
              "title" => "Carretera Atlacomulco",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/Libramiento-Acambay - copia.webp",
              "address" => "Estado de México",
              "latitude" => "19.576420",
              "longitude" => "-99.757558"
            ],
            [
              "id" => 40,
              "title" => "Carretera México-Toluca",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/Carretera-Mexico-Toluca - copia.webp",
              "address" => "Estado de México",
              "latitude" => "19.476500",
              "longitude" => "-99.313410"
            ],
            [
              "id" => 26,
              "title" => "Circuito Interior",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/infraestructura/circuito-interior-cdmx - copia.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.415335",
              "longitude" => "-99.098684"
            ],
            [
              "id" => 41,
              "title" => "Deprimido Lilas",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/Deprimido-Lilas - copia.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.387149",
              "longitude" => "-99.247673"
            ],
            [
              "id" => 11,
              "title" => "Distribuidor San Jerónimo - Las Flores",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/Distribuidor-San-Jeronimo-Las-Flores - copia.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.331097",
              "longitude" => "-99.210529"
            ],
            [
              "id" => 12,
              "title" => "Distribuidor Vial La Concordia",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/Distribuidor-Vial-La-Concordia - copia.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.359359",
              "longitude" => "-98.996160"
            ],
            [
              "id" => 13,
              "title" => "Distribuidor Vial de Muyuguarda",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/Distribuidor-Vial-Muyguarda - copia.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.281009",
              "longitude" => "-99.116521"
            ],
            [
              "id" => 27,
              "title" => "Distribuidor Vial Subterráneo Insurgentes Mixcoac",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/infraestructura/vial-subterraneo-insurgentes-mixcoac - copia.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.378494",
              "longitude" => "-99.192498"
            ],
            [
              "id" => 17,
              "title" => "El Ojite",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/e-vehicular-el-ojite-tuxpan-veracruz - copia.webp",
              "address" => "Veracruz",
              "latitude" => "20.969656",
              "longitude" => "-97.527538"
            ],
            [
              "id" => 14,
              "title" => "Libramiento Acambay",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/Libramiento-Acambay - copia.webp",
              "address" => "Estado de México",
              "latitude" => "19.972159",
              "longitude" => "-99.892873"
            ],
            [
              "id" => 42,
              "title" => "Libramiento Ciudad Valles-Tamuín",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/Libramiento-Ciudad-Valles-Tamuin - copia.webp",
              "address" => "San Luis Potosí",
              "latitude" => "21.985084",
              "longitude" => "-99.003874"
            ],
            [
              "id" => 28,
              "title" => "Mexibús Línea 1",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/infraestructura/mexibus-lineas-1-2-cdmx - copia.webp",
              "address" => "Estado de México",
              "latitude" => "19.647175",
              "longitude" => "-99.004482"
            ],
            [
              "id" => 29,
              "title" => "Mexibús Línea 2",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/infraestructura/mexibus-lineas-1-2-cdmx - copia.webp",
              "address" => "Estado de México",
              "latitude" => "19.611938",
              "longitude" => "-99.058755"
            ],
            [
              "id" => 35,
              "title" => "Nueva Italia-Apatzingán",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/infraestructura/acabus-acapulco - copia.webp",
              "address" => "Michoacán",
              "latitude" => "19.065674",
              "longitude" => "-102.352809"
            ],
            [
              "id" => 37,
              "title" => "Parque Lineal Gran Canal",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/infraestructura/Parque-Lineal-Gran-Canal - copia.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.446953",
              "longitude" => "-99.101538"
            ],
            [
              "id" => 16,
              "title" => "Puente Atirantado Aeropuerto",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/Puente-Aeropuerto - copia.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.416884",
              "longitude" => "-99.098046"
            ],
            [
              "id" => 23,
              "title" => "Puente de Rodamiento Aeronáutico ASUR Cancún",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/Puente-Rodamiento-Aeropuerto-Asur-Cancun-Copia.webp",
              "address" => "Quintana Roo",
              "latitude" => "21.041268",
              "longitude" => "-86.871420"
            ],
            [
              "id" => 43,
              "title" => "Tramo Carretero Jala-Compostela",
              "category" => 1,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/Mantenimiento-Rehabilitacion-Operacion-Tramo-Carretero-Jala-Compostela - copia.webp",
              "address" => "Nayarit",
              "latitude" => "21.130800",
              "longitude" => "-104.905932"
            ],

            // EDIFICACIÓN / CONSTRUCCIÓN (ffa608) - Categoría 2
            [
              "id" => 38,
              "title" => "Aduana Modelo Reynosa",
              "category" => 2,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/Aduana-Modelo-Reynosa - copia.webp",
              "address" => "Tamaulipas",
              "latitude" => "26.043356",
              "longitude" => "-98.210167"
            ],
            [
              "id" => 2,
              "title" => "Centro de Convenciones de La Paz",
              "category" => 2,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/centro-de-convenciones-la-paz - copia.webp",
              "address" => "Baja California Sur",
              "latitude" => "24.317797",
              "longitude" => "-110.329695"
            ],
            [
              "id" => 5,
              "title" => "Centro De Gobierno Guerrero",
              "category" => 2,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/centro-de-gobierno-guerrero - copia.webp",
              "address" => "Guerrero",
              "latitude" => "17.528718",
              "longitude" => "-99.495119"
            ],
            [
              "id" => 6,
              "title" => "Centro Nacional De Las Artes",
              "category" => 2,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/centro-nacional-de-las-artes - copia.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.356563",
              "longitude" => "-99.141150"
            ],
            [
              "id" => 7,
              "title" => "Colegio Green Hills",
              "category" => 2,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/colegio-green-hills-cdmx - copia.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.323001",
              "longitude" => "-99.237103"
            ],
            [
              "id" => 8,
              "title" => "Colegio Nacional De Economistas",
              "category" => 2,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/colegio-nacional-de-economistas - copia.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.434577",
              "longitude" => "-99.160362"
            ],
            [
              "id" => 9,
              "title" => "Hospital ISSSTE Morelos",
              "category" => 2,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/hospital-issste-morelos - copia.webp",
              "address" => "Morelos",
              "latitude" => "18.922575",
              "longitude" => "-99.206003"
            ],
            [
              "id" => 10,
              "title" => "Hospital ISSSTE Veracruz",
              "category" => 2,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/hospital-issste-veracruz - copia.webp",
              "address" => "Veracruz",
              "latitude" => "19.172514",
              "longitude" => "-96.134365"
            ],
            [
              "id" => 51,
              "title" => "Museo Iztapalapa",
              "category" => 2,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/museo-Infantil Iztapalapa - copia.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.346584",
              "longitude" => "-99.065727"
            ],
            [
              "id" => 19,
              "title" => "Senado de la República",
              "category" => 2,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/senado-de-la-republica-panoramica - copia.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.436735",
              "longitude" => "-99.192476"
            ],
            [
              "id" => 22,
              "title" => "Tribunal Superior de Justicia",
              "category" => 2,
              "status" => 1,
              "marker_image" => "imagenes_indi/Construccion/tribunal-superior-de-justicia-cdmx - copia.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.421937",
              "longitude" => "-99.150188"
            ],

            // MARÍTIMO (0066f9) - Categoría 3
            [
              "id" => 101,
              "title" => "Fase 2 y 3 Puerto de Manzanillo",
              "category" => 3,
              "status" => 1,
              "marker_image" => "imagenes_indi/Maritimo/puerto-manzanillo-1 - copia.webp",
              "address" => "Colima",
              "latitude" => "19.0560",
              "longitude" => "-104.3181"
            ],
            [
              "id" => 102,
              "title" => "Rompeolas Salina Cruz",
              "category" => 3,
              "status" => 1,
              "marker_image" => "imagenes_indi/Maritimo/Rompe-Olas-Salina-Cruz-Oaxaca-3 - copia.jpg",
              "address" => "Oaxaca",
              "latitude" => "16.1414",
              "longitude" => "-95.2040"
            ],
            [
              "id" => 103,
              "title" => "Muelle Lerma",
              "category" => 3,
              "status" => 1,
              "marker_image" => "imagenes_indi/Maritimo/muelle-lerma-campeche - copia.webp",
              "address" => "Campeche",
              "latitude" => "19.8050",
              "longitude" => "-90.6041"
            ],
            [
              "id" => 104,
              "title" => "Nueva Terminal Portuaria de Veracruz",
              "category" => 3,
              "status" => 1,
              "marker_image" => "imagenes_indi/Maritimo/a-terminal-portuaria-puerto-veracruz - copia.webp",
              "address" => "Veracruz",
              "latitude" => "19.2359",
              "longitude" => "-96.1702"
            ],
            [
              "id" => 105,
              "title" => "Terminal de Contenedores Muelle Lázaro Cárdenas",
              "category" => 3,
              "status" => 1,
              "marker_image" => "imagenes_indi/Maritimo/contenedores-muelle-lazaro-cardenas.webp",
              "address" => "Michoacán",
              "latitude" => "17.9536",
              "longitude" => "-102.1731"
            ],
            [
              "id" => 106,
              "title" => "Puente Marítimo Ignacio Chávez",
              "category" => 3,
              "status" => 1,
              "marker_image" => "imagenes_indi/Maritimo/Puente-Maritimo-Ignacio-Chavez - copia.webp",
              "address" => "Michoacán",
              "latitude" => "17.9921",
              "longitude" => "-102.1760"
            ],
            [
              "id" => 107,
              "title" => "Morro Rompeolas Isla del Carmen",
              "category" => 3,
              "status" => 1,
              "marker_image" => "imagenes_indi/Maritimo/morro-rompeolas-isla-del-carmen - copia.webp",
              "address" => "Campeche",
              "latitude" => "18.6473",
              "longitude" => "-91.8538"
            ],

            // FERROVIARIA (ff3000) - Categoría 4
            [
              "id" => 31,
              "title" => "Patio Martín Carrera",
              "category" => 4,
              "status" => 1,
              "marker_image" => "imagenes_indi/infraestructura/patio-martin-carrera-cdm - copia.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.483860",
              "longitude" => "-99.105411"
            ],
            [
              "id" => 32,
              "title" => "Planta de Durmientes del Tren Maya",
              "category" => 4,
              "status" => 1,
              "marker_image" => "imagenes_indi/infraestructura/Fabrica-de-Durmientes-Merida-1 - copia.jpg",
              "address" => "Yucatán",
              "latitude" => "20.869778",
              "longitude" => "-89.576804"
            ],
            [
              "id" => 34,
              "title" => "Tren Maya Tramo 3 'Calkiní-Izamal'",
              "category" => 4,
              "status" => 1,
              "marker_image" => "imagenes_indi/infraestructura/Tren-Maya-Tramos-3-y-5-a - copia.jpg",
              "address" => "Yucatán",
              "latitude" => "20.370866",
              "longitude" => "-90.049828"
            ]
        ];

        return view('proyectos', compact('projects'));
    }
}
