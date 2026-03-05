<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = [
            // EDIFICACIÓN / CONSTRUCCIÓN (ffa608) - Categoría 2
            [
              "id" => 38,
              "title" => "Aduana Modelo Reynosa",
              "category" => 2,
              "status" => 1,
              "marker_image" => "images/mapa/AduanaModeloReynosa.jpg",
              "address" => "Tamaulipas",
              "latitude" => "26.043356702007856",
              "longitude" => "-98.21016743889464"
            ],
            [
              "id" => 2,
              "title" => "Centro de Convenciones de La Paz",
              "category" => 2,
              "status" => 1,
              "marker_image" => "images/mapa/centrodeconvencioneslapaz.webp",
              "address" => "Baja California Sur",
              "latitude" => "24.317797820314965",
              "longitude" => "-110.32969594155198"
            ],
            [
              "id" => 3,
              "title" => "Centro de Distribución Metropolitano Bimbo",
              "category" => 2,
              "status" => 1,
              "marker_image" => "images/mapa/cedisazcapotzalco.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.491658276606824",
              "longitude" => "-99.19293783033675"
            ],
            [
              "id" => 5,
              "title" => "Centro De Gobierno Guerrero",
              "category" => 2,
              "status" => 1,
              "marker_image" => "images/mapa/centro-de-gobierno-guerrero.webp",
              "address" => "Guerrero",
              "latitude" => "17.528718972066933",
              "longitude" => "-99.49511910759996"
            ],
            [
              "id" => 6,
              "title" => "Centro Nacional De Las Artes",
              "category" => 2,
              "status" => 1,
              "marker_image" => "images/mapa/centronacionaldelasartes.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.35656354905553",
              "longitude" => "-99.14115090318215"
            ],
            [
              "id" => 7,
              "title" => "Colegio Green Hills",
              "category" => 2,
              "status" => 1,
              "marker_image" => "images/mapa/Colegiogreenhills.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.323001955325694",
              "longitude" => "-99.23710313201897"
            ],
            [
              "id" => 8,
              "title" => "Colegio Nacional De Economistas",
              "category" => 2,
              "status" => 1,
              "marker_image" => "images/mapa/colegiodeeconomia.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.434577534440223",
              "longitude" => "-99.16036271852617"
            ],
            [
              "id" => 9,
              "title" => "Hospital ISSSTE Morelos",
              "category" => 2,
              "status" => 1,
              "marker_image" => "images/mapa/issstemorelos.jpg",
              "address" => "Morelos",
              "latitude" => "18.92257593587055",
              "longitude" => "-99.20600384680608"
            ],
            [
              "id" => 10,
              "title" => "Hospital ISSSTE Veracruz",
              "category" => 2,
              "status" => 1,
              "marker_image" => "images/mapa/isssteveracruz.jpg",
              "address" => "Veracruz",
              "latitude" => "19.17251454916543",
              "longitude" => "-96.13436581019303"
            ],
            [
              "id" => 51,
              "title" => "Museo Iztapalapa",
              "category" => 2,
              "status" => 1,
              "marker_image" => "images/mapa/museoyancuic.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.346584273311752",
              "longitude" => "-99.06572748057395"
            ],
            [
              "id" => 14,
              "title" => "Palma Criolla",
              "category" => 2,
              "status" => 1,
              "marker_image" => "images/mapa/palmacriolla.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.40582535239807",
              "longitude" => "-99.27447165066425"
            ],
            [
              "id" => 49,
              "title" => "Pilares",
              "category" => 2,
              "status" => 1,
              "marker_image" => "images/mapa/Pilares.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.34486647224915",
              "longitude" => "-99.02998066548183"
            ],
            [
              "id" => 50,
              "title" => "Preparatoria Iztapalapa",
              "category" => 2,
              "status" => 1,
              "marker_image" => "images/mapa/preparatoriaiztapalapa.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.35838806686903",
              "longitude" => "-99.00045491912468"
            ],
            [
              "id" => 19,
              "title" => "Senado de la República",
              "category" => 2,
              "status" => 1,
              "marker_image" => "images/mapa/senadodelarepublica.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.436735882467698",
              "longitude" => "-99.1924766697048"
            ],
            [
              "id" => 22,
              "title" => "Tribunal Superior de Justicia",
              "category" => 2,
              "status" => 1,
              "marker_image" => "images/mapa/tribunalsuperiordejusticia.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.42193768234548",
              "longitude" => "-99.15018803078685"
            ],

            // INFRAESTRUCTURA (64b032) - Categoría 1
            [
              "id" => 1,
              "title" => "Aeropuerto Internacional Ángel Albino Corzo",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/Centro-de-Congresos-de-Huatulco.webp",
              "address" => "Chiapas",
              "latitude" => "16.559170868067913",
              "longitude" => "-93.02309090172653"
            ],
            [
              "id" => 52,
              "title" => "App Arriaga-Tapachula",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/apparriagatapachulas.jpg",
              "address" => "Chiapas",
              "latitude" => "15.591360459587738",
              "longitude" => "-93.06591634887083"
            ],
            [
              "id" => 25,
              "title" => "Calzada Flotante",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/calzadaflotante.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.42138511226902",
              "longitude" => "-99.19437567340077"
            ],
            [
              "id" => 39,
              "title" => "Carretera Atlacomulco",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/colegio-nacional-de-economistas.webp",
              "address" => "Estado de México",
              "latitude" => "19.576420949365605",
              "longitude" => "-99.75755888841478"
            ],
            [
              "id" => 40,
              "title" => "Carretera México-Toluca",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/Carretera-Mexico-Toluca.webp",
              "address" => "Ciudad de México / Estado de México",
              "latitude" => "19.476500305598073",
              "longitude" => "-99.31341086175512"
            ],
            [
              "id" => 26,
              "title" => "Circuito Interior",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/circuito-interior-cdmx.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.41533556916731",
              "longitude" => "-99.09868463236788"
            ],
            [
              "id" => 41,
              "title" => "Deprimido Lilas",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/Deprimido-Lilas.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.387149970565865",
              "longitude" => "-99.24767352881159"
            ],
            [
              "id" => 11,
              "title" => "Distribuidor San Jerónimo - Las Flores",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/Las-Flores.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.331097292582207",
              "longitude" => "-99.21052959425978"
            ],
            [
              "id" => 12,
              "title" => "Distribuidor Vial La Concordia",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/DistribuidorVialLaConcordia.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.359359059488042",
              "longitude" => "-98.99616050593467"
            ],
            [
              "id" => 13,
              "title" => "Distribuidor Vial de Muyuguarda",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/DistribuidorVialdeMuyuguarda.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.281009422677744",
              "longitude" => "-99.11652191366812"
            ],
            [
              "id" => 27,
              "title" => "Distribuidor Vial Subterráneo Insurgentes Mixcoac",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/distribuidorvialmixcoac.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.378494544443523",
              "longitude" => "-99.19249887894742"
            ],
            [
              "id" => 17,
              "title" => "El Ojite",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/elojite.webp",
              "address" => "Veracruz",
              "latitude" => "20.969656039580023",
              "longitude" => "-97.52753874158313"
            ],
            [
              "id" => 44,
              "title" => "Intersección de Circuito Interior y Boulevard Puerto Aéreo",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/circuito-interior1-cdmx.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.416874600497305",
              "longitude" => "-99.09802550353234"
            ],
            [
              "id" => 14,
              "title" => "Libramiento Acambay",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/libramientoacambay.jpg",
              "address" => "Estado de México",
              "latitude" => "19.972159106506133",
              "longitude" => "-99.89287328479777"
            ],
            [
              "id" => 42,
              "title" => "Libramiento Ciudad Valles-Tamuín",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/vallestamuin.webp",
              "address" => "San Luis Potosí",
              "latitude" => "21.985084623176213",
              "longitude" => "-99.00387410348654"
            ],
            [
              "id" => 28,
              "title" => "Mexibús Línea 1",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/Metrobus-Linea-1.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.647175710399683",
              "longitude" => "-99.00448226389625"
            ],
            [
              "id" => 29,
              "title" => "Mexibús Línea 2",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/mexibus-linea-2.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.611938123319334",
              "longitude" => "-99.05875510038446"
            ],
            [
              "id" => 35,
              "title" => "Nueva Italia-Apatzingán",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/colegio-nacional-de-economistas.webp",
              "address" => "Michoacán",
              "latitude" => "19.06567473794431",
              "longitude" => "-102.35280950456234"
            ],
            [
              "id" => 37,
              "title" => "Parque Lineal Gran Canal",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/parquelinealgrancanal.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.44695300943304",
              "longitude" => "-99.10153855924186"
            ],
            [
              "id" => 16,
              "title" => "Puente Atirantado Aeropuerto",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/Puente-Aeropuerto.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.416884719128053",
              "longitude" => "-99.0980469612034"
            ],
            [
              "id" => 23,
              "title" => "Puente de Rodamiento Aeronáutico ASUR Cancún",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/puentecancun.jpg",
              "address" => "Quintana Roo",
              "latitude" => "21.041268409521724",
              "longitude" => "-86.87142023289235"
            ],
            [
              "id" => 45,
              "title" => "Puente El Alamito",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/PuenteElAlamito.jpg",
              "address" => "Baja California Sur",
              "latitude" => "32.06500858879402",
              "longitude" => "-115.04543725258993"
            ],
            [
              "id" => 46,
              "title" => "Puente Plutarco Elías Calles del Circuito Interior",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/Puente-Plutarco-Elias-Calles-Circuito-Interior.webp",
              "address" => "Ciudad de México",
              "latitude" => "19.39889068913735",
              "longitude" => "-99.09918225102801"
            ],
            [
              "id" => 47,
              "title" => "Puente Tampaón II",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/tampaonII.webp",
              "address" => "Veracruz",
              "latitude" => "21.90443421477913",
              "longitude" => "-98.62728294363978"
            ],
            [
              "id" => 33,
              "title" => "Puentes de Acceso del AIFA",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/puentesdeaccesoaifa.jpg",
              "address" => "Estado de México",
              "latitude" => "19.7051308773827",
              "longitude" => "-99.0704139842151"
            ],
            [
              "id" => 18,
              "title" => "Segundo Piso Periférico",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/segundopisoperiferico.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.336779795925978",
              "longitude" => "-99.1924766697048"
            ],
            [
              "id" => 20,
              "title" => "Sistema Cutzamala",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/sistemacutzamala.webp",
              "address" => "Estado de México",
              "latitude" => "19.390832205985568",
              "longitude" => "-100.07676121757885"
            ],
            [
              "id" => 48,
              "title" => "SIT Oaxaca",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/SIT-Oaxaca.webp",
              "address" => "Oaxaca",
              "latitude" => "17.05543602577505",
              "longitude" => "-96.72260636364084"
            ],
            [
              "id" => 21,
              "title" => "Terminal y Torre del NAICM",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/terminalytorrenaicm.jpg",
              "address" => "Estado de México",
              "latitude" => "19.436735882467698",
              "longitude" => "-99.0704133678184"
            ],
            [
              "id" => 43,
              "title" => "Tramo Carretero Jala-Compostela",
              "category" => 1,
              "status" => 1,
              "marker_image" => "images/mapa/JalaCompostela.jpg",
              "address" => "Nayarit",
              "latitude" => "21.13080066999437",
              "longitude" => "-104.90593252965425"
            ],

            // MARÍTIMO (0066f9) - Categoría 3
            [
              "id" => 101,
              "title" => "Fase 2 y 3 Puerto de Manzanillo",
              "category" => 3,
              "status" => 1,
              "marker_image" => "https://images.unsplash.com/photo-1577412647305-991150c7d163?auto=format&fit=crop&q=80&w=800",
              "address" => "Colima",
              "latitude" => "19.0560",
              "longitude" => "-104.3181"
            ],
            [
              "id" => 102,
              "title" => "Rompeolas Salina Cruz",
              "category" => 3,
              "status" => 1,
              "marker_image" => "https://images.unsplash.com/photo-1520437358207-323b43b50729?auto=format&fit=crop&q=80&w=800",
              "address" => "Oaxaca",
              "latitude" => "16.1414",
              "longitude" => "-95.2040"
            ],
            [
              "id" => 103,
              "title" => "Muelle Lerma",
              "category" => 3,
              "status" => 1,
              "marker_image" => "https://images.unsplash.com/photo-1544243000-dc1286f78864?auto=format&fit=crop&q=80&w=800",
              "address" => "Campeche",
              "latitude" => "19.8050",
              "longitude" => "-90.6041"
            ],
            [
              "id" => 104,
              "title" => "Nueva Terminal Portuaria de Veracruz",
              "category" => 3,
              "status" => 1,
              "marker_image" => "https://images.unsplash.com/photo-1569263979104-865ab7cd8d13?auto=format&fit=crop&q=80&w=800",
              "address" => "Veracruz",
              "latitude" => "19.2359",
              "longitude" => "-96.1702"
            ],
            [
              "id" => 105,
              "title" => "Terminal de Contenedores Muelle Lázaro Cárdenas",
              "category" => 3,
              "status" => 1,
              "marker_image" => "https://images.unsplash.com/photo-1580674285054-bed31e145f59?auto=format&fit=crop&q=80&w=800",
              "address" => "Michoacán",
              "latitude" => "17.9536",
              "longitude" => "-102.1731"
            ],
            [
              "id" => 106,
              "title" => "Puente Marítimo Ignacio Chávez",
              "category" => 3,
              "status" => 1,
              "marker_image" => "https://images.unsplash.com/photo-1513622470522-26c3c8a854bc?auto=format&fit=crop&q=80&w=800",
              "address" => "Michoacán",
              "latitude" => "17.9921",
              "longitude" => "-102.1760"
            ],
            [
              "id" => 107,
              "title" => "Morro Rompeolas Isla del Carmen",
              "category" => 3,
              "status" => 1,
              "marker_image" => "https://images.unsplash.com/photo-1499195333224-3ce974e30baa?auto=format&fit=crop&q=80&w=800",
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
              "marker_image" => "images/mapa/patiomartincarrera.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.483860156558524",
              "longitude" => "-99.10541180223525"
            ],
            [
              "id" => 32,
              "title" => "Planta de Durmientes del Tren Maya",
              "category" => 4,
              "status" => 1,
              "marker_image" => "images/mapa/durmientestramo3.jpg",
              "address" => "Yucatán",
              "latitude" => "20.869778799037725",
              "longitude" => "-89.57680482160768"
            ],
            [
              "id" => 34,
              "title" => "Tren Maya Tramo 3 'Calkiní-Izamal'",
              "category" => 4,
              "status" => 1,
              "marker_image" => "images/mapa/trenmayatramo3.jpg",
              "address" => "Yucatán",
              "latitude" => "20.37086628106332",
              "longitude" => "-90.0498281106875"
            ],
            [
              "id" => 36,
              "title" => "Túnel L12 del metro",
              "category" => 4,
              "status" => 1,
              "marker_image" => "images/mapa/tunell12.jpg",
              "address" => "Ciudad de México",
              "latitude" => "19.356300303516942",
              "longitude" => "-99.10096743513847"
            ]
        ];

        return view('proyectos', compact('projects'));
    }
}
