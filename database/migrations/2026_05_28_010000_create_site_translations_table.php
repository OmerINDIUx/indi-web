<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_translations', function (Blueprint $table) {
            $table->id();
            $table->string('group')->index();
            $table->string('key')->unique();
            $table->string('label');
            $table->text('text_es')->nullable();
            $table->text('text_en')->nullable();
            $table->boolean('is_multiline')->default(false);
            $table->timestamps();
        });

        $now = now();
        $rows = [
            ['General', 'nav.projects', 'Menu: Proyectos', 'PROYECTOS', 'PROJECTS', false],
            ['General', 'nav.business', 'Menu: Negocios', 'NEGOCIOS', 'BUSINESS', false],
            ['General', 'nav.press', 'Menu: Prensa', 'PRENSA', 'PRESS', false],
            ['General', 'nav.social', 'Menu: Social', 'SOCIAL', 'SOCIAL', false],
            ['General', 'language.switch_to_es', 'Boton idioma: cambiar a espanol', 'ES', 'ES', false],
            ['General', 'language.switch_to_en', 'Boton idioma: cambiar a ingles', 'EN', 'EN', false],
            ['General', 'category.all', 'Categoria: todos', 'TODOS', 'ALL', false],
            ['General', 'category.maritimo', 'Categoria: maritimo', 'MARITIMO', 'MARITIME', false],
            ['General', 'category.construccion', 'Categoria: construccion', 'CONSTRUCCION', 'CONSTRUCTION', false],
            ['General', 'category.infraestructura', 'Categoria: infraestructura', 'INFRAESTRUCTURA', 'INFRASTRUCTURE', false],
            ['General', 'category.ferroviario', 'Categoria: ferroviario', 'FERROVIARIO', 'RAILWAY', false],
            ['General', 'category.ferroviaria', 'Categoria: ferroviaria', 'FERROVIARIA', 'RAILWAY', false],
            ['General', 'footer.cta', 'Footer: llamada principal', 'CONSTRUYAMOS EL FUTURO', 'LET US BUILD THE FUTURE', false],
            ['General', 'footer.business_awareness.title', 'Footer: conciencia empresarial titulo', 'CONCIENCIA EMPRESARIA', 'BUSINESS AWARENESS', false],
            ['General', 'footer.business_awareness.text', 'Footer: conciencia empresarial texto', 'Certificamos nuestros procesos con los mas altos estandares internacionales de calidad, para ofrecer a nuestros clientes la seguridad de una empresa altamente comprometida con cada proyecto.', 'We certify our processes under the highest international quality standards, giving our clients the assurance of a company deeply committed to every project.', true],
            ['General', 'footer.environmental_awareness.title', 'Footer: conciencia ambiental titulo', 'CONCIENCIA AMBIENTAL', 'ENVIRONMENTAL AWARENESS', false],
            ['General', 'footer.environmental_awareness.text', 'Footer: conciencia ambiental texto', 'Grupo Indi promueve activamente acciones que favorecen la conservacion y el cuidado del medio ambiente, comprometiendose a utilizar de manera racional y eficiente los recursos naturales en todos sus proyectos. Como parte de sus iniciativas, el grupo implementa la recoleccion de equipos, materiales y accesorios electronicos, los cuales son enviados a centros de acopio y reciclaje certificados.', 'Grupo Indi actively promotes actions that support environmental protection and conservation, committing to the rational and efficient use of natural resources across all projects. As part of these initiatives, the group collects electronic equipment, materials, and accessories, which are sent to certified collection and recycling centers.', true],
            ['General', 'footer.contact', 'Footer: contacto', 'CONTACTO', 'CONTACT', false],
            ['General', 'footer.view', 'Footer: ver', 'VER', 'VIEW', false],
            ['General', 'footer.brochure', 'Footer: brochure', 'BROCHURE INTERACTIVO', 'INTERACTIVE BROCHURE', false],
            ['General', 'footer.ethics', 'Footer: codigo de etica', 'CODIGO DE ETICA 2025', 'CODE OF ETHICS 2025', false],
            ['General', 'footer.hr', 'Footer: recursos humanos', 'RECURSOS HUMANOS', 'HUMAN RESOURCES', false],
            ['General', 'footer.talent', 'Footer: talento', 'BUSCAMOS TALENTO', 'WE ARE LOOKING FOR TALENT', false],
            ['General', 'footer.transparency', 'Footer: transparencia', 'TRANSPARENCIA', 'TRANSPARENCY', false],
            ['General', 'footer.complaints', 'Footer: quejas', 'QUEJAS Y DENUNCIAS', 'COMPLAINTS AND REPORTS', false],
            ['General', 'footer.privacy', 'Footer: aviso privacidad', 'AVISO DE PRIVACIDAD', 'PRIVACY NOTICE', false],
            ['General', 'footer.terms', 'Footer: terminos', 'TERMINOS', 'TERMS', false],

            ['Inicio', 'home.hero.title', 'Inicio: hero', 'PASION POR EL PROGRESO', 'PASSION FOR PROGRESS', false],
            ['Inicio', 'home.stats.years.title', 'Inicio: anos titulo', 'ANOS', 'YEARS', false],
            ['Inicio', 'home.stats.years.text', 'Inicio: anos texto', 'CONSTRUYENDO EL FUTURO DE MEXICO', 'BUILDING MEXICO FUTURE', false],
            ['Inicio', 'home.stats.cities.title', 'Inicio: ciudades titulo', 'CIUDADES', 'CITIES', false],
            ['Inicio', 'home.stats.cities.text', 'Inicio: ciudades texto', 'IMPULSADAS POR NUESTRA INNOVACION', 'POWERED BY OUR INNOVATION', false],
            ['Inicio', 'home.stats.projects.title', 'Inicio: proyectos titulo', 'PROYECTOS', 'PROJECTS', false],
            ['Inicio', 'home.stats.projects.text', 'Inicio: proyectos texto', 'TERMINADOS CON LA MAS ALTA CALIDAD', 'DELIVERED WITH THE HIGHEST QUALITY', false],
            ['Inicio', 'home.stats.families.title', 'Inicio: familias titulo', 'FAMILIAS INDI', 'INDI FAMILIES', false],
            ['Inicio', 'home.stats.families.text', 'Inicio: familias texto', 'NUESTROS COLABORADORES SON NUESTRO MOTOR', 'OUR PEOPLE ARE OUR DRIVING FORCE', false],
            ['Inicio', 'home.unit.maritime.title', 'Inicio: maritimo titulo', 'INDI MARITIMO', 'INDI MARITIME', false],
            ['Inicio', 'home.unit.maritime.text', 'Inicio: maritimo texto', 'Dominio tecnico en ingenieria portuaria, escolleras monumentales y obras de dragado. Integramos tecnologias de vanguardia para superar las dinamicas costeras y conectar a Mexico con el mundo.', 'Technical command of port engineering, monumental breakwaters, and dredging works. We integrate advanced technologies to overcome coastal dynamics and connect Mexico with the world.', true],
            ['Inicio', 'home.unit.infrastructure.title', 'Inicio: infraestructura titulo', 'INDI INFRAESTRUCTURA', 'INDI INFRASTRUCTURE', false],
            ['Inicio', 'home.unit.infrastructure.text', 'Inicio: infraestructura texto', 'Desarrollo de sistemas de movilidad urbana y transporte masivo de alta precision tecnica, resolviendo retos complejos para conectar y transformar las metropolis.', 'Development of urban mobility and mass transit systems with high technical precision, solving complex challenges to connect and transform metropolitan areas.', true],
            ['Inicio', 'home.unit.construction.title', 'Inicio: construccion titulo', 'INDI CONSTRUCCION', 'INDI CONSTRUCTION', false],
            ['Inicio', 'home.unit.construction.text', 'Inicio: construccion texto', 'Especialistas en ingenieria civil de alta complejidad y cimentacion profunda. Ejecutamos obras iconicas y monumentales, garantizando la maxima integridad estructural e innovacion arquitectonica.', 'Specialists in highly complex civil engineering and deep foundations. We deliver iconic and monumental works, ensuring maximum structural integrity and architectural innovation.', true],
            ['Inicio', 'home.unit.railway.title', 'Inicio: ferroviaria titulo', 'INDI FERROVIARIA', 'INDI RAILWAY', false],
            ['Inicio', 'home.unit.railway.text', 'Inicio: ferroviaria texto', 'Ingenieria avanzada para sistemas de transporte ferroviario de carga y pasajeros a gran escala. Trazamos y construimos rutas resilientes que impulsan la competitividad logistica a nivel nacional.', 'Advanced engineering for large-scale passenger and freight rail systems. We design and build resilient routes that strengthen national logistics competitiveness.', true],
            ['Inicio', 'home.projects.location', 'Inicio: ubicacion', 'Ubicacion', 'Location', false],
            ['Inicio', 'home.projects.year', 'Inicio: ano', 'Ano', 'Year', false],
            ['Inicio', 'home.projects.time', 'Inicio: tiempo', 'Tiempo', 'Timeline', false],
            ['Inicio', 'home.projects.thinking', 'Inicio: pensamiento estrategico', 'PENSAMIENTO ESTRATEGICO', 'STRATEGIC THINKING', false],
            ['Inicio', 'home.projects.visit_news', 'Inicio: visita noticias', 'Visita las Noticias', 'Visit News', false],
            ['Inicio', 'home.blog.read', 'Inicio: leer articulo', 'LEER ARTICULO', 'READ ARTICLE', false],

            ['Negocios', 'business.construction.title', 'Negocios: construccion titulo', 'INDI CONSTRUCCION', 'INDI CONSTRUCTION', false],
            ['Negocios', 'business.construction.desc', 'Negocios: construccion descripcion', 'Nos especializamos en cimentacion profunda y en la ejecucion de obras de alta complejidad para la construccion, modernizacion, rehabilitacion y conservacion de vialidades, puentes, edificaciones, puertos, muelles y escolleras. Cada uno de estos proyectos esta respaldado por nuestra capacidad tecnica y nuestro enfoque en la calidad, garantizando soluciones duraderas y eficientes.', 'We specialize in deep foundations and highly complex works for the construction, modernization, rehabilitation, and maintenance of roads, bridges, buildings, ports, docks, and breakwaters. Each project is backed by our technical capacity and quality-focused approach, ensuring durable and efficient solutions.', true],
            ['Negocios', 'business.construction.detail', 'Negocios: construccion detalle', 'Entre sus obras mas destacadas se incluyen la construccion y modernizacion de muelles, escolleras, terminales portuarias, y obras de dragado, todas disenadas para mejorar el flujo de mercancias y garantizar la seguridad y eficiencia en las operaciones maritimas. Estos proyectos no solo impulsan el desarrollo del comercio exterior, sino que tambien contribuyen a dinamizar las economias regionales.', 'Key works include the construction and modernization of docks, breakwaters, port terminals, and dredging projects, all designed to improve cargo flow and ensure safe, efficient maritime operations. These projects strengthen foreign trade and help energize regional economies.', true],
            ['Negocios', 'business.infrastructure.title', 'Negocios: infraestructura titulo', 'INDI INFRAESTRUCTURA', 'INDI INFRASTRUCTURE', false],
            ['Negocios', 'business.infrastructure.desc', 'Negocios: infraestructura descripcion', 'Somos inversionistas, constructores y operadores de proyectos clave en Mexico, tales como autopistas, estacionamientos y sistemas de transporte publico, desarrollados bajo el modelo de Asociacion Publico-Privada (APP). Este enfoque nos permite impulsar proyectos que mejoran la infraestructura nacional, generando soluciones que fortalecen la conectividad y movilidad en el pais.', 'We are investors, builders, and operators of key projects in Mexico, including highways, parking facilities, and public transit systems developed under Public-Private Partnership models. This approach enables us to deliver projects that improve national infrastructure and strengthen connectivity and mobility.', true],
            ['Negocios', 'business.infrastructure.detail', 'Negocios: infraestructura detalle', 'Nos especializamos en la ejecucion de obras de prestacion de servicios y concesiones, tanto a nivel estatal como federal, con un profundo conocimiento de las necesidades del sector publico. Nuestro objetivo es ofrecer proyectos sostenibles y de alta calidad que contribuyan al desarrollo economico y social de Mexico, garantizando eficiencia y estabilidad a largo plazo.', 'We specialize in service provision and concession projects at both state and federal levels, with deep knowledge of public-sector needs. Our goal is to deliver sustainable, high-quality projects that contribute to Mexico economic and social development while ensuring long-term efficiency and stability.', true],
            ['Negocios', 'business.maritime.title', 'Negocios: maritimo titulo', 'INDI MARITIMO', 'INDI MARITIME', false],
            ['Negocios', 'business.maritime.desc', 'Negocios: maritimo descripcion', 'Grupo INDI ha sido un actor clave en el desarrollo de la infraestructura maritima y portuaria en Mexico, contribuyendo de manera significativa al crecimiento del comercio y la conectividad en el pais. El compromiso con la calidad y la innovacion ha permitido que sus proyectos maritimos y portuarios cumplan con los mas altos estandares internacionales, posicionando a Mexico como un hub logistico competitivo.', 'Grupo INDI has been a key player in the development of maritime and port infrastructure in Mexico, making a significant contribution to trade growth and national connectivity. Its commitment to quality and innovation has allowed maritime and port projects to meet the highest international standards, positioning Mexico as a competitive logistics hub.', true],
            ['Negocios', 'business.maritime.detail', 'Negocios: maritimo detalle', 'A lo largo de su trayectoria, ha ejecutado proyectos de alta complejidad tecnica en diversos puertos estrategicos, que han fortalecido la capacidad operativa del sistema portuario mexicano. Entre sus obras mas destacadas se incluyen la construccion y modernizacion de muelles, escolleras, terminales portuarias, y obras de dragado, todas disenadas para garantizar la seguridad operativa.', 'Throughout its history, Grupo INDI has delivered highly complex technical projects in strategic ports, strengthening the operational capacity of Mexico port system. Its key works include the construction and modernization of docks, breakwaters, port terminals, and dredging works designed to ensure operational safety.', true],
            ['Negocios', 'business.railway.title', 'Negocios: ferroviaria titulo', 'INDI FERROVIARIA', 'INDI RAILWAY', false],
            ['Negocios', 'business.railway.desc', 'Negocios: ferroviaria descripcion', 'Ingenieria ferroviaria avanzada para sistemas de transporte de carga y pasajeros a gran escala. Resolvemos retos logisticos y de orografia compleja, trazando rutas estrategicas que impulsan la competitividad nacional mediante infraestructura resiliente y de alto rendimiento tecnico.', 'Advanced railway engineering for large-scale freight and passenger transport systems. We solve logistics and complex terrain challenges, defining strategic routes that boost national competitiveness through resilient, high-performance infrastructure.', true],
            ['Negocios', 'business.railway.detail', 'Negocios: ferroviaria detalle', 'Nuestra capacidad tecnica nos permite participar en proyectos estrategicos de conectividad masiva y transporte de carga, integrando soluciones de movilidad que transforman la dinamica de las metropolis. Cada proyecto esta respaldado por un enfoque riguroso en la calidad y la seguridad estructural de gran escala.', 'Our technical capacity allows us to participate in strategic mass-connectivity and freight transport projects, integrating mobility solutions that transform metropolitan dynamics. Every project is backed by a rigorous focus on quality and large-scale structural safety.', true],

            ['Prensa', 'press.title', 'Prensa: titulo', 'CONOCE LAS ULTIMAS NOTICIAS DE GRUPO INDI', 'DISCOVER THE LATEST NEWS FROM GRUPO INDI', false],
            ['Prensa', 'press.read', 'Prensa: leer', 'LEER ARTICULO', 'READ ARTICLE', false],
            ['Prensa', 'press.search', 'Prensa: buscador', 'BUSCA, NOSOTROS TE EXPLICAMOS', 'SEARCH, WE WILL EXPLAIN IT', false],
            ['Prensa', 'press.filter', 'Prensa: filtro', 'FILTRAR POR UNIDADES DE NEGOCIO', 'FILTER BY BUSINESS UNIT', false],
            ['Prensa', 'press.coming_soon_title', 'Prensa: proximamente titulo', 'PROXIMAMENTE MAS NOTICIAS', 'MORE NEWS COMING SOON', false],
            ['Prensa', 'press.coming_soon_text', 'Prensa: proximamente texto', 'Estamos preparando nuevos articulos y novedades de Grupo INDI.', 'We are preparing new articles and updates from Grupo INDI.', true],
            ['Prensa', 'press.latest', 'Prensa: ultimos', 'ULTIMOS ARTICULOS', 'LATEST ARTICLES', false],
            ['Prensa', 'press.no_latest', 'Prensa: sin recientes', 'No hay otros articulos recientes.', 'There are no other recent articles.', false],

            ['Proyectos', 'projects.title', 'Proyectos: titulo', 'NUESTROS PROYECTOS', 'OUR PROJECTS', false],
            ['Proyectos', 'projects.subtitle', 'Proyectos: subtitulo', 'MAS DE 50 ANOS CONSTRUYENDO LA INFRAESTRUCTURA DE MEXICO', 'OVER 50 YEARS BUILDING MEXICO INFRASTRUCTURE', false],
            ['Proyectos', 'projects.search', 'Proyectos: buscador', 'BUSCAR PROYECTO O UBICACION...', 'SEARCH PROJECT OR LOCATION...', false],
            ['Proyectos', 'projects.location', 'Proyectos: ubicacion', 'UBICACION', 'LOCATION', false],
            ['Proyectos', 'projects.status', 'Proyectos: estado', 'ESTADO', 'STATUS', false],
            ['Proyectos', 'projects.type', 'Proyectos: tipo', 'TIPO', 'TYPE', false],
            ['Proyectos', 'projects.archive', 'Proyectos: archivo', 'ARCHIVE_01', 'ARCHIVE_01', false],
            ['Proyectos', 'projects.technical_domain', 'Proyectos: dominio tecnico', 'DOMINIO TECNICO', 'TECHNICAL DOMAIN', false],
            ['Proyectos', 'projects.active_locations', 'Proyectos: localizaciones', 'LOCALIZACIONES ACTIVAS', 'ACTIVE LOCATIONS', false],
            ['Proyectos', 'projects.locate', 'Proyectos: localizar', 'LOCALIZAR +', 'LOCATE +', false],
            ['Proyectos', 'projects.completed', 'Proyectos: completado', 'COMPLETADO', 'COMPLETED', false],
            ['Proyectos', 'projects.in_progress', 'Proyectos: en proceso', 'EN PROCESO', 'IN PROGRESS', false],

            ['Social', 'social.title', 'Social: titulo', 'RESPONSABILIDAD SOCIAL', 'SOCIAL RESPONSIBILITY', false],
            ['Social', 'social.subtitle', 'Social: subtitulo', 'CONSTRUYENDO EL FUTURO CON CONCIENCIA AMBIENTAL, ENERGETICA Y SOCIAL', 'BUILDING THE FUTURE WITH ENVIRONMENTAL, ENERGY, AND SOCIAL AWARENESS', false],
            ['Social', 'social.intro_tag', 'Social: intro etiqueta', 'WE INDI', 'WE INDI', false],
            ['Social', 'social.intro_text', 'Social: intro texto', 'Mediante esta division y con la trayectoria y formalidad que le caracterizan, Grupo Indi busca incidir con proyectos que contribuyan al desarrollo sostenible del pais y que generen mejora en la calidad de vida de la sociedad.', 'Through this division, and with the experience and professionalism that define it, Grupo Indi seeks to make an impact through projects that contribute to the country sustainable development and improve society quality of life.', true],
            ['Social', 'social.environment.tag', 'Social: ambiente etiqueta', 'MEDIO AMBIENTE', 'ENVIRONMENT', false],
            ['Social', 'social.environment.title', 'Social: ambiente titulo', 'COMPROMISO CON EL ACUARIO DEL MUNDO', 'COMMITMENT TO THE AQUARIUM OF THE WORLD', false],
            ['Social', 'social.environment.text', 'Social: ambiente texto', 'En Grupo Indi nos preocupa cada detalle por lo que una de nuestras principales metas es trabajar cada obra con conciencia ambiental y de preservacion animal.', 'At Grupo Indi, every detail matters. One of our main goals is to carry out each project with environmental awareness and a commitment to animal preservation.', true],
            ['Social', 'social.snail.title', 'Social: caracol titulo', 'RESCATE DE CARACOL PURPURA', 'PURPLE SNAIL RESCUE', false],
            ['Social', 'social.snail.text', 'Social: caracol texto', 'Acciones para la conservacion del caracol Plicopurpura pansa en Salina Cruz, preservando una cultura textil y ecologica milenaria.', 'Actions to conserve the Plicopurpura pansa snail in Salina Cruz, preserving an ancient textile and ecological culture.', true],
            ['Social', 'social.island.title', 'Social: isla titulo', 'ISLA SAN JOSE', 'SAN JOSE ISLAND', false],
            ['Social', 'social.island.text', 'Social: isla texto', 'Proyecto de investigacion en colaboracion con la UABC para evaluar impactos del cambio climatico en la biodiversidad marina del Golfo de California.', 'Research project in collaboration with UABC to assess the impacts of climate change on marine biodiversity in the Gulf of California.', true],
            ['Social', 'social.energy.tag', 'Social: energia etiqueta', 'ENERGIA LIMPIA', 'CLEAN ENERGY', false],
            ['Social', 'social.energy.title', 'Social: energia titulo', 'INNOVACION ENERGETICA', 'ENERGY INNOVATION', false],
            ['Social', 'social.energy.text', 'Social: energia texto', 'A traves de las energias renovables y manejo de residuos, reiteramos nuestra alianza con el pais en la lucha contra el cambio climatico.', 'Through renewable energy and waste management, we reaffirm our partnership with the country in the fight against climate change.', true],
            ['Social', 'social.energy.project_title', 'Social: planta titulo', 'PLANTA FOTOVOLTAICA PROTON PF', 'PROTON PF PHOTOVOLTAIC PLANT', false],
            ['Social', 'social.energy.project_text', 'Social: planta texto', 'Aportamos de manera innovadora al desarrollo de un ambiente mas limpio y sustentable mediante infraestructura energetica de vanguardia.', 'We contribute innovatively to a cleaner and more sustainable environment through advanced energy infrastructure.', true],
            ['Social', 'social.support.tag', 'Social: apoyo etiqueta', 'APOYO SOCIAL', 'SOCIAL SUPPORT', false],
            ['Social', 'social.support.title', 'Social: apoyo titulo', 'FOMENTO DEPORTIVO Y SOCIAL', 'SPORTS AND SOCIAL DEVELOPMENT', false],
            ['Social', 'social.support.text', 'Social: apoyo texto', 'Creemos en el poder transformador del deporte para fortalecer comunidades, promover la salud y difundir valores de disciplina y perseverancia.', 'We believe in the transformative power of sports to strengthen communities, promote health, and share values of discipline and perseverance.', true],
            ['Social', 'social.support.years', 'Social: anos impacto', 'ANOS DE IMPACTO', 'YEARS OF IMPACT', false],
            ['Social', 'social.support.certification', 'Social: certificacion', 'CERTIFICACION', 'CERTIFICATION', false],
            ['Social', 'social.foundation.tag', 'Social: fundacion etiqueta', 'FUNDACION MMC', 'MMC FOUNDATION', false],
            ['Social', 'social.foundation.title', 'Social: fundacion titulo', 'HERENCIA DE BIENESTAR', 'A LEGACY OF WELL-BEING', false],
            ['Social', 'social.foundation.text', 'Social: fundacion texto', 'Honramos la memoria del Ingeniero Manuel Ruben Munoz Cano Cardoso, buscando un Mexico mas equitativo y prospero.', 'We honor the memory of Engineer Manuel Ruben Munoz Cano Cardoso by working toward a more equitable and prosperous Mexico.', true],
            ['Social', 'social.foundation.topic', 'Social: salud mental', 'SALUD MENTAL', 'MENTAL HEALTH', false],
            ['Social', 'social.foundation.topic_text', 'Social: salud texto', 'Actualmente orientamos nuestros esfuerzos en mejorar la salud mental en Mexico, rompiendo tabues y brindando apoyo a quienes mas lo necesitan.', 'We currently focus our efforts on improving mental health in Mexico, breaking taboos and providing support to those who need it most.', true],
            ['Social', 'social.learn_more', 'Social: saber mas', 'SABER MAS', 'LEARN MORE', false],

            ['Formularios', 'talent.title', 'Talento: titulo', 'UNETE A INDI', 'JOIN INDI', false],
            ['Formularios', 'talent.intro', 'Talento: intro', 'Forma parte del equipo que esta construyendo el futuro de Mexico. Compartenos tus datos y nos pondremos en contacto contigo.', 'Become part of the team building Mexico future. Share your information with us and we will contact you.', true],
            ['Formularios', 'talent.name', 'Talento: nombre', 'Nombre Completo *', 'Full Name *', false],
            ['Formularios', 'talent.email', 'Talento: correo', 'Correo Electronico *', 'Email *', false],
            ['Formularios', 'talent.phone', 'Talento: telefono', 'Telefono', 'Phone', false],
            ['Formularios', 'talent.area', 'Talento: area', 'Area de Interes', 'Area of Interest', false],
            ['Formularios', 'talent.area_placeholder', 'Talento: area placeholder', 'Selecciona un area', 'Select an area', false],
            ['Formularios', 'talent.cv', 'Talento: cv', 'Adjunta tu CV (PDF, DOCX)', 'Attach your CV (PDF, DOCX)', false],
            ['Formularios', 'talent.message', 'Talento: mensaje', 'Mensaje Adicional', 'Additional Message', false],
            ['Formularios', 'talent.submit', 'Talento: enviar', 'Enviar Solicitud', 'Submit Application', false],
            ['Formularios', 'complaints.title', 'Quejas: titulo', 'CANAL DE DENUNCIAS', 'REPORTING CHANNEL', false],
            ['Formularios', 'complaints.intro', 'Quejas: intro', 'Espacio confidencial para reportar cualquier anomalia o queja relacionada con nuestras operaciones, colaboradores o proyectos. Puedes reportarlo de manera anonima si asi lo deseas.', 'A confidential space to report any irregularity or complaint related to our operations, collaborators, or projects. You may report anonymously if you wish.', true],
            ['Formularios', 'complaints.privacy', 'Quejas: privacidad', 'Nota de Privacidad: Si lo deseas, puedes dejar tus datos de contacto vacios para hacer una denuncia anonima. Sin embargo, proporcionar un correo o telefono nos permitira dar un seguimiento mas efectivo.', 'Privacy Note: If you wish, you may leave your contact information blank to make an anonymous report. However, providing an email or phone number will allow us to follow up more effectively.', true],
            ['Formularios', 'complaints.name', 'Quejas: nombre', 'Nombre Completo (Opcional)', 'Full Name (Optional)', false],
            ['Formularios', 'complaints.email', 'Quejas: correo', 'Correo Electronico (Opcional)', 'Email (Optional)', false],
            ['Formularios', 'complaints.phone', 'Quejas: telefono', 'Telefono (Opcional)', 'Phone (Optional)', false],
            ['Formularios', 'complaints.type', 'Quejas: tipo', 'Tipo de Reporte *', 'Report Type *', false],
            ['Formularios', 'complaints.type_complaint', 'Quejas: opcion queja', 'Queja / Inconformidad', 'Complaint / Nonconformity', false],
            ['Formularios', 'complaints.type_report', 'Quejas: opcion denuncia', 'Denuncia de acto ilicito o etico', 'Report of illegal or unethical conduct', false],
            ['Formularios', 'complaints.type_suggestion', 'Quejas: opcion sugerencia', 'Sugerencia de mejora', 'Improvement suggestion', false],
            ['Formularios', 'complaints.description', 'Quejas: descripcion', 'Descripcion de los Hechos *', 'Description of the Facts *', false],
            ['Formularios', 'complaints.placeholder', 'Quejas: placeholder', 'Proporciona el mayor detalle posible (quien, que, cuando, donde)...', 'Provide as much detail as possible (who, what, when, where)...', false],
            ['Formularios', 'complaints.evidence', 'Quejas: evidencia', 'Evidencia (Opcional - Imagen, PDF, DOC)', 'Evidence (Optional - Image, PDF, DOC)', false],
            ['Formularios', 'complaints.submit', 'Quejas: enviar', 'Enviar Reporte Seguro', 'Submit Secure Report', false],
            ['Viewer', 'viewer.loading', 'Viewer: cargando', 'GENERANDO ENTORNO INTERACTIVO...', 'GENERATING INTERACTIVE ENVIRONMENT...', false],
            ['Viewer', 'viewer.zoom', 'Viewer: zoom', 'ZOOM', 'ZOOM', false],
            ['Viewer', 'viewer.previous', 'Viewer: anterior', 'ANTERIOR', 'PREVIOUS', false],
            ['Viewer', 'viewer.next', 'Viewer: siguiente', 'SIGUIENTE', 'NEXT', false],
            ['Viewer', 'viewer.download', 'Viewer: descargar', 'DESCARGAR PDF', 'DOWNLOAD PDF', false],
        ];

        DB::table('site_translations')->insert(array_map(function (array $row) use ($now) {
            return [
                'group' => $row[0],
                'key' => $row[1],
                'label' => $row[2],
                'text_es' => $row[3],
                'text_en' => $row[4],
                'is_multiline' => $row[5],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, $rows));
    }

    public function down(): void
    {
        Schema::dropIfExists('site_translations');
    }
};
