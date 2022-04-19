<?php

namespace Database\Seeders;

use App\Models\blocks;
use App\Models\Clientes;
use App\Models\Clientes_items;
use App\Models\contactos;
use App\Models\descargas;
use App\Models\descargas_items;
use App\Models\eq_human_items;
use App\Models\items_carteleras;
use App\Models\nuestro_servicio;
use App\Models\paginas;
use App\Models\Quienes_somos;
use Illuminate\Database\Seeder;

class PaginaBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        ////Pagina Asesorias Administrativas ////
       $pagina1=paginas::create([
           'titulo'=>'Asesorías Administrativas',
           'titulo2'=>'Sector Público',
           'titulo3'=>null,
           'img_url'=>'assets/images/bg/banner.jpg',
           'sub_titulo'=>'Nuestra razón de ser es facilitar, a las entidades privadas y públicas el  cumplimiento de sus servicios con excelente calidad, prestando asesoría en:'
       ]);
       blocks::create([
           'content'=>"
                  <h3>Sistema de gestión de calidad</h3>
                  <p> El Sistema de Gestión de la Calidad, es una herramienta útil para mejorar el desempeño y la productividad. En esta área  asesoramos en forma personalizada, el diseño y desarrollo  del sistema; como la capacitación  en los elementos básicos. </p>
                  <h3>Implementación de auditoría interna</h3>
                  <p> Asesoría y acompañamiento en la aplicación de auditorías internas, acorde con las normas de auditoría generalmente aceptadas. </p>
                  <h3>Modelo integrado de planeación y gestión - MIPG</h3>
                  <p> Servicios de asesoría, capacitación y acompañamiento en la implementación del Modelo Integrado de Planeación y Gestión -MIPG, como marco de referencia para dirigir, planear, ejecutar, hacer seguimiento, evaluar y controlar la gestión de las entidades y organismos públicos. </p>
           ",
           'img_url'=>'assets/images/single-service/1.jpg',
           'paginas_id'=>$pagina1->id
       ]);

       //Segundo bloque
       blocks::create([
            'content'=>"
                   <h3>Factores de riesgo psicosociales en el trabajo</h3>
          <p> Asesoría, capacitación y acompañamiento en la  identificación, evaluación, prevención, intervención  y monitoreo  permanente  de la exposición  a factores de riesgos psicosocial en el trabajo y  la  determinación del origen de las patologías causadas por el estrés ocupacional. Resolución 2646 del 17 de julio de 2008. </p>
          <h3>Balanced scorecard</h3>
          <p> Asesoría, capacitación y apoyo a la implementación del     Balanced Scorecard para que las entidades  logren la combinación de medición y gestión bajo cuatro perspectivas: financiera, clientes, procesos e innovación y aprendizaje. Mapas estratégicos. </p>
          <h3>Gestión por competencias</h3>
          <p> <strong>Apoyo, asesoría y capacitación para la Implementación de la Gestión por Competencias Laborales, a través del desarrollo de las siguientes actividades:</strong></p>
          <ul>
            <li> Programa de Inducción y Reinducción Laboral.</li>
            <li> Planes de Capacitación y Bienestar Laboral al personal de la entidad.</li>
            <li> Aplicación, modificación y elaboración del Manual de Funciones.</li>
            <li> Capacitación a todo el personal sobre el desarrollo de las competencias laborales.</li>
            <li> Implementación de procesos de evolución por competencias.</li>
          </ul>
           ",
            'img_url'=>'assets/images/single-service/2.jpg',
            'paginas_id'=>$pagina1->id
        ]);
        //BLOQUE 3
        blocks::create([
            'content'=>"
                  <h3>Implementación costos ABC</h3>
                  <p> Asesoría, capacitación y apoyo a la implementación de costos ABC, los cuales son de suma importancia, ya que son los que determinan la viabilidad de la entidad, establecen mayoritariamente el grado de productividad y eficacia en la utilización de los recursos. </p>
                  <h3>Gestión documentación y tablas de retención documental</h3>
                  <p> Asesoría a la organización, conservación y fortalecimiento de los archivos institucionales, con el fin de conservar la memoria, preservar el patrimonio documental y la  elaboración e implementación de la tabla de retención, teniendo en cuenta los parámetros    fijados por la Ley 594 de 2000 y sus decretos reglamentarios. </p>
                  <h3>Plan de desarrollo municipal - evaluación y seguimiento</h3>
                  <p> Se asesora en la formulación e implementación del plan de desarrollo, de manera  que se logre la articulación  de los diferentes componentes: Evaluación y seguimiento a los diferentes programas,  teniendo en cuenta  las plataformas tecnológicas establecidas por planeación nacional y las entidades de control. </p>
           ",
            'img_url'=>'assets/images/single-service/3.jpg',
            'paginas_id'=>$pagina1->id
        ]);

        //bloque 4
        blocks::create([
            'content'=>"
                  <h3>Actualización de pasivocol y el cálculo actuarial</h3>
                  <p> Asesoría y acompañamiento para cumplir con los requerimientos del ministerio de hacienda, frente a los pasivos pensionales, a través del aplicativo “pasivocol” y el cálculo actuarial establecido en la ley 100 de 1993, ley 549 de 1999 y sus decretos reglamentarios vigentes. En esta área la consultoría incluye: </p>
                  <h3>Asesoría en salud</h3>
                  <p> Apoyo, acompañamiento y asesoría en la auditoría al aseguramiento y acceso a los servicios de salud; en el proceso de ejecución del fondo local de salud y el proceso de recertificación para la evaluación de la capacidad de gestión en salud de los municipios. </p>
                  <h3>Rendición de informes área de la salud</h3>
                  <p> Rendición de los informes en las plataformas dispuestas por el ministerio de salud y la  supersalud. </p>
                  <h3>Elaboración y gestión de proyectos</h3>
                  <p> El servicio en este campo está dirigido a la elaboración y gestión de  proyectos, aplicando la metodología y normatividad vigente, con el fin de acceder a recursos de cofinanciación en los diferentes sectores de inversión, inmersos en los distintos programas de las secretarías. </p>
           ",
            'img_url'=>'assets/images/single-service/4.jpg',
            'paginas_id'=>$pagina1->id
        ]);

        //bloque 5
        blocks::create([
            'content'=>"
                    <h3>Servicios públicos domiciliarios acueducto, alcantarillado y aseo</h3>
                  <ul>
                    <li>Asesoría financiera y contable.</li>
                    <li>Implementación de  metodologías, tarifarias y regulación en la prestación de los servicios de acueducto, alcantarillado y aseo.</li>
                    <li>Elaboración de informes para el sui.</li>
                    <li>Elaboración de material educativo con temas relacionados a los servicios públicos domiciliarios, en   especial el manejo integral de los residuos sólidos.</li>
                    <li>Auditoría a los operadores de los sistemas de servicios públicos. </li>
                  </ul>
                  <h3>Rendición de informes</h3>
                  <ul>
                    <li>Reportes de información para el departamento nacional de planeación en los aplicativos siee -sicep</li>
                    <li>Estructuración , parametrización  de alphasig.</li>
                    <li>Reporte de información  aplicativo  sireci- libro de legalización del gasto, fut, sui.</li>
                    <li>Asesoría e implementación  de la rendición del sistema general de regalías en los aplicativos : cuentas, gesproy y suifp.</li>
                  </ul>
            ",
            'img_url'=>'assets/images/single-service/5.jpg',
            'paginas_id'=>$pagina1->id
        ]);
        //// end Asesorias Administrativas ////


        //// Asesorias financieras ////
        $pagina2=paginas::create([
            'titulo'=>'Asesorías Financieras',
            'titulo2'=>'SECTOR PRIVADO',
            'titulo3'=>'SECTOR PÚBLICO',
            'img_url'=>'assets/images/bg/banner4.jpg',
            'sub_titulo'=>'Fortalecer las políticas y procedimientos de las entidades públicas y privadas del área contable, asesorando y apoyando el registro de las operaciones  financieras para que se realicen acorde con la normatividad vigente.'
        ]);
        //primer bloque
        blocks::create([
            'content'=>"
                 <h3>Asesoría tributaría</h3>
              <p> Orientación en la aplicación de la legislación tributaria vigente, obligaciones  tributarias, elaboración declaraciones tributarias de orden nacional (Iva-Retenciones en la fuente, Declaraciones de Renta, CREE) y municipal (Ica, Retenciones de Ica), Actualizaciones Fiscales; Auditorias Tributarias y trámites ante la DIAN, entre los que se tienen:
                </h3>
              <ul>
                <li>Resolución autorización de Facturación</li>
                <li>Requerimientos especiales</li>
                <li>Creación y actualización del RUT</li>
                <li>Mecanismo digital</li>
              </ul>
              <h3>Creación de empresas</h3>
              <p>El éxito de un negocio, depende de su estructuración al momento de iniciar operaciones, se asesora en la elaboración de la minuta para la constitución de la sociedad o empresa, trámites ante la cámara de comercio, registro de proponentes, trámites ante la autoridad municipal y ante la dian.
                </h3>
            ",
            'img_url'=>'assets/images/single-service/1.jpg',
            'paginas_id'=>$pagina2->id
        ]);
        // segundo bloque
        blocks::create([
            'content'=>'
                  <h3>Implementación de normas internacionales de información financiera niif / ifrs</h3>
                  <p> Asesoría, acompañamiento y capacitación en la implementación de las niif, en el sector público y privado,  acorde  con la normatividad  que regula a cada sector.
                    </h3>
                  <h3>Revisoría fiscal</h3>
                  <p> Servicio revisoría fiscal, según lo establecido en la normas vigentes, verificar el cumplimiento de las disposiciones legales y normas estatutarias, evaluación de los controles establecidos por la organización, evaluación de la gestión administrativa  y auditoría a los estados financieros, con el fin de dictaminarlos.
                    </h3>
            ',
            'img_url'=>'assets/images/single-service/6.jpg',
            'paginas_id'=>$pagina2->id
        ]);
        // Tercer bloque, luego del segundo titulo3
        blocks::create([
            'content'=>'
                  <h3>implementación catálogo – ccpet</h3>
                  <p>Fortalecimiento y acompañamiento técnico en el proceso de planificación en el proyecto del presupuesto anual, metodología catálogo de clasificación presupuestal para las entidades territoriales y sus descentralizadas ccpet.</p>
                  <h3>Marco fiscal a mediano plazo</h3>
                  <p>Capacitación y asesoría en la elaboración del marco fiscal a mediano plazo; como apoyo al desarrollo de la gestión financiera</p>
                  <h3>Cumplimiento indicador 617 de 2000</h3>
                  <p>Capacitación y asesoría en la aplicación de políticas de racionalización del gasto público y fortalecimiento  de los ingresos propios, para que la entidad mejore el indicador, establecido en la ley 617</p>
                  <h3>Asesoría en la aplicación de la ley 550 de 1999</h3>
                  <ul>
                    <li>Proyección del escenario financiero.</li>
                    <li>Levantamiento del inventario de acreencias.</li>
                    <li>Estructuración de los estados financieros.</li>
                    <li>Asesoría en la elaboración de la propuesta base de negociación.</li>
                    <li>Acompañamiento en el cumplimientoudel acuerdo de reestructuración de pasivos.</li>
                  </ul>
            ',
            'img_url'=>'assets/images/single-service/3.jpg',
            'paginas_id'=>$pagina2->id
        ]);
        // cuarto bloque
        blocks::create([
            'content'=>'
                  <h3>Auditoría financiera a los impuestos municipales</h3>
                  <p> Capacitación y asesoría en la implementación de procedimientos tributarios orientados a la fiscalización tributaria para  reducir los niveles de evasión de impuestos; mediante conductas preventivas, investigación, determinación y penalización. Elaboración y actualización del estatuto tributario.</p>
                  <h3>Sostenibilidad de la información financiera Saneamiento contable</h3>
                  <p>Asesoría, capacitación  y apoyo  en la implementación de herramientas contables que permitan lograr la sostenibilidad de la información financiera o el  saneamiento contable de acuerdo a los parámetros  establecidos por la contaduría general de la nación.</p>
                  <h3>Fortalecimiento manejo del sistema general de regalías</h3>
                  <p>Acompañamiento, asesoría y apoyo en la gestión para fortalecer el manejo y presentación de informes de la ejecución de los recursos del sistema general de  regalías- sgr- en coherencia con la normativa del sistema de monitoreo, seguimiento, control y evaluación -smsce- del sistema general de regalías.</p>
                  <h3>Fondo de servicios educativos<br>
                    – inspección y vigilancia</h3>
                  <p>Asesoría, capacitación y apoyo a la implementación de los procedimientos contables y presupuestales específicos para los entes educativos públicos y privados. </p>
            ',
            'img_url'=>'assets/images/single-service/4.jpg',
            'paginas_id'=>$pagina2->id
        ]);
        //// END Asesorias financieras ////


        //// Carteleras Digitales ////

       $index=paginas::create([
            'titulo'=>'Carteleras Digitales',
            'titulo2'=>'¿En Qué Consiste?',
            'titulo3'=>null,
            'img_url'=>'assets/images/bg/banner5.jpg',
            'img_url_2'=>'assets/images/carteleras-digitales.jpg',
            'sub_titulo'=>'Es una solución que te permite agregar un canal de comunicaciones para administrar y publicar contenidos en tiempo real, te permite informar oportunamente, entretener y mejorar las comunicaciones entre quienes hacen parte de tu equipo de trabajo y los que visitan tu empresa, oficina o establecimiento comercial.'
        ]);

        eq_human_items::create([
            'title_eq'=>'Carteleras Administrativas',
            'subtitle_eq'=>null,
            'content'=>"
                Son Ideales para realizar un seguimiento sobre el comportamiento financiero y administrativo de su empresa o negocio, facilitando la toma de decisones en momentos determinados para cada proceso. Visualización de datos de Microsoft Power BI.
            ",
            'pertenece_id'=>$index->id
        ]);

        eq_human_items::create([
            'title_eq'=>'Carteleras Corporativas',
            'subtitle_eq'=>null,
            'content'=>"
                Permiten la publicación de imágenes y vídeos corporativos, conmemoración de fechas especiales, campañas informativas o educativas y en general cualquier contenido de tipo corporativo que se desees dar a conocer.
            ",
            'pertenece_id'=>$index->id
        ]);

        eq_human_items::create([
            'title_eq'=>'Carteleras Dinámicas',
            'subtitle_eq'=>null,
            'content'=>"
                Facilitan la integración de módulos de redes sociales, tasa representativa del mercado (TRM), pronóstico del clima y hora local. Adicionalmente, permiten enlazar cualquier tipo de contenido alojado en una página web o URL específica.
            ",
            'pertenece_id'=>$index->id
        ]);

        eq_human_items::create([
            'title_eq'=>'Beneficios de las Carteleras Digitales',
            'subtitle_eq'=>null,
            'content'=>"
                <ul>
                  <li>Actualización de contenido en tiempo real en las pantallas que tengas instaladas.</li>
                  <li>Agilidad y efectividad para transmitir mensajes al personal interno o externo a tu organización.</li>
                  <li>Variedad en los contenidos transmitidos: Piezas gráficas, animaciones, videos, fotos, textos, dashboard, etc.</li>
                  <li>Segmentación para la distribución del contenido en cada pantalla según tu público objetivo.</li>
                  <li>Contenido personalizado y a la medida de las necesidades comunicativas de tu empresa o establecimiento comercial.</li>
                </ul>
            ",
            'pertenece_id'=>$index->id
        ]);


        //// END Carteleras Digitales ////


        //// Creacion de empresas ////
        $pagina4=paginas::create([
            'titulo'=>'Creación de Empresas',
            'titulo2'=>'Asesoría y Gestoria para Emprendedores y Nuevas Empresas',
            'titulo3'=>null,
            'img_url'=>'assets/images/bg/banner7.jpg',
            'sub_titulo'=>'Juntos ponemos en marcha tu nuevo proyecto.'
        ]);
        //bloque 1
        blocks::create([
            'content'=>"
                 <h3>Te ayudamos tanto si quieres crear una empresa como si te quieres dar de alta como autónomo</h3>
                  <p>Te ayudamos a entender cual es la mejor forma de gestionar tu negocio. Te damos de alta como autónomo o te ayudamos a crear una empresa.<br>
                    Además tu gestor personal se encargará de tramitár todas tus obligaciones con las administraciones, gestionar tus nóminas, llevar tu contabilidad, presentar tus declaraciones fiscales y todo con total transparencia y manteniéndote al tanto en todo momento.
                    </h3>
                  <h3>Las ayudas e incentivos por los que puedes optar como emprendedor</h3>
                  <p>Cada proyecto empresarial lo que necesita es el foco desde el minuto uno.<br>
                    Ponemos a tu disposición un buscador actualizado, a todas las ayudas e incentivos para tu actividad empresarial.
                    </h3>
                  <h3>Menos papeleo, y más seguridad para tu empresa</h3>
                  <p>Desde el principio de tu actividad accede a toda la información financiera relacionada con tu nuevo negocio de forma inmediata, 24/7 y desde cualquier dispositivo.<br>
                    Además con la tranquilidad de que tus datos son confidenciales y están sometidos a los controles rigurosos en materia de seguridad de la información.
                    </h3>
            ",
            'img_url'=>'assets/images/single-service/2.jpg',
            'paginas_id'=>$pagina4->id
        ]);
        //bloque 2
        blocks::create([
            'content'=>"
                 <h3>Asesoramiento al inicio de la actividad</h3>
                  <ul>
                    <li>Creación de empresas.</li>
                    <li>Diseño de estructuras societarias eficientes.</li>
                    <li>Optimización de recursos a la actividad emprendedora.</li>
                    <li>Régimen de autónomos.</li>
                    <li>Planes de retribución a socios administradores.</li>
                    <li>Tramitación expedientes de ayudas y subvenciones.</li>
                  </ul>
                  <h3>Planes de negocio</h3>
                  <ul>
                    <li>Planes de fiabilidad financiera y tesorería.</li>
                    <li>Asesoría en desarrollo de modelos de negocio.</li>
                  </ul>
                  <h3>Asesoría legal y fiscal en procesos de consolidación de proyectos</h3>
                  <ul>
                    <li>Pactos de socios.</li>
                    <li>Representación y gestión mercantil.</li>
                    <li>Cumplimiento normativo.</li>
                    <li>Planificación y análisis fiscal para la empresa y los socios.</li>
                    <li>Gestión documental y soporte en procesos de auditoria..</li>
                  </ul>
            ",
            'img_url'=>'assets/images/single-service/5.jpg',
            'paginas_id'=>$pagina4->id
        ]);

        ////END Creacion de empresas ////

        //// Normas Niff///

        $pagina5=paginas::create([
            'titulo'=>'Normas niff',
            'titulo2'=>'Normas niff',
            'titulo3'=>null,
            'img_url'=>'assets/images/bg/banner7.jpg',
            'sub_titulo'=>'Normas niff'
        ]);
        //bloque 1
        blocks::create([
            'content'=>"
                <p>content</p>
            ",
            'img_url'=>'assets/images/single-service/2.jpg',
            'paginas_id'=>$pagina5->id
        ]);
        //bloque 2
        blocks::create([
            'content'=>"
                segundo contenido :D
            ",
            'img_url'=>'assets/images/single-service/5.jpg',
            'paginas_id'=>$pagina5->id
        ]);


        paginas::create([
            'titulo'=>'Blog',
            'titulo2'=>'Noticias & Actualidad',
            'titulo3'=>null,
            'img_url'=>'assets/images/bg/banner7.jpg',
            'sub_titulo'=>'Blog'
        ]);




        //Protecion de datos
        $pagina6=paginas::create([
            'titulo'=>'Protección de datos',
            'titulo2'=>'Aviso de Privacidad',
            'titulo3'=>null,
            'img_url'=>'assets/images/bg/banner7.jpg',
            'sub_titulo'=>null
        ]);
        //bloque 1
        blocks::create([
            'content'=>"
               En cumplimiento de la Ley Estatutaria 1581 de 2.012 de Protección de Datos (LEPD) y normas que la reglamenten, el presente Aviso de Privacidad tiene como objeto obtener la autorización expresa e informada del Titular para el tratamiento y la transferencia de sus datos a terceras entidades. Las condiciones del tratamiento son las siguientes:

1. Grupo Asesor en Gestión S.A.S. identificada con el NIT No. 811045365-9, será el responsable del tratamiento de sus datos personales.

2. Con objeto de recibir una atención integral como cliente, los datos personales recabados serán tratados con las siguientes finalidades:

3. Es de carácter facultativo suministrar información que verse sobre Datos Sensibles, entendidos como aquellos que afectan la intimidad o generen algún tipo de discriminación, o sobre menores de edad.

4. La política de tratamiento de los datos del Titular, así como los cambios sustanciales que se produzcan en ésta, se podrán consultar en el siguiente correo electrónico: info@grupoasesorengestion.com

5. El Titular puede ejercitar los derechos de acceso, corrección, supresión, revocación o reclamo por infracción sobre sus datos con un escrito dirigido a GRUPO ASESOR EN GESTIÓN S.A.S a la dirección de correo electrónico info@grupoasesorengestion.com indicando en el asunto el derecho que desea ejercitar; o mediante correo postal remitido a Carrera 73 Nº45e – 04, Edificio Condominio Castelfuerte II, Oficina 103, Medellín – Colombia.
            ",
            'img_url'=>'assets/images/single-service/2.jpg',
            'paginas_id'=>$pagina6->id
        ]);


        //

        $pagina7=paginas::create([
            'titulo'=>'Cláusula de Consentimiento Web',
            'titulo2'=>'Cláusula de Consentimiento Web',
            'titulo3'=>null,
            'img_url'=>'assets/images/bg/banner7.jpg',
            'sub_titulo'=>null
        ]);
        //bloque 1
        blocks::create([
                        'content'=>"
                          De acuerdo con la Ley Estatutaria 1581 de 2012 de Protección de Datos y normas concordantes, se informa al usuario que los datos consignados en el presente formulario serán incorporados en una base de datos responsabilidad de GRUPO ASESOR EN GESTION S.A.S, siendo tratados con la finalidad de realizar, gestión administrativa, marketing y prospección comercial.

            Es de carácter facultativo suministrar información que verse sobre Datos Sensibles, entendidos como aquellos que afectan la intimidad o generen algún tipo de discriminación, o sobre menores de edad.

            La política de tratamiento de los datos del Titular, así como los cambios sustanciales que se produzcan en ésta, se podrán consultar a través del siguiente correo electrónico: protecciondedatos@grupoasesorengestion.com. De igual manera, la misma se mantendrán actualizada en la página web de la entidad, cuya dirección es http://www.grupoasesorengestion.com

            Usted puede ejercitar los derechos de acceso, corrección, supresión, revocación o reclamo por infracción sobre los datos, mediante escrito dirigido a GRUPO ASESOR EN GESTION S.A.S, a la dirección de correo electrónico protecciondedatos@grupoasesorengestion.com, indicando en el asunto el derecho que desea ejercitar, o mediante correo ordinario remitido a la dirección CR 73 45 E 04 OF 103 MEDELLÍN, ANTIOQUIA.",
            'img_url'=>'assets/images/single-service/2.jpg',
            'paginas_id'=>$pagina7->id
        ]);






        // Segundo pack de paginas ///
        ///Quienes somos ///
        Quienes_somos::create([
            'title1'=>'Quienes Somos',
            'title2'=>'Grupo Asesor En Gestión',
            'title3'=>'Historia',
            'sub_title'=>'Asesorías Financieras y Administrativas, Consultarías',
            'sub_title2'=>'Grupo Asesor En Gestión S.A.S',
            'content1'=>"
                <p>Fue creado el 26 de Mayo de 2004. El 31 de 2006, cambió su denominación por Grupo Asesor en Gestión Ltda y en el 2015 cambió su razón social a Grupo Asesor en Gestión S.A.S
                </h3>
                  <h3>Misión</h3>
                  <p>Prestar Servicios en asesoría contable, financiera y administrativa, interventoría y auditoria al Régimen subsidiado en salud, mantenimiento y sostenimiento al Modelo Estándar de Control Interno, implementación del Modelo de Gestión por Competencias y Gestión de la calidad e Implementación del sistema de Gestión Documental y la comercialización de productos tecnológicos y software con personal comprometido y competente para contribuir al desarrollo, optimización de los recursos y toma de decisiones de las entidades públicas y privadas.
                    </h3>
                  <h3>Visión</h3>
                  <p>Grupo Asesor en Gestión S.A.S será en el 2030, una empresa comprometida con la excelencia, destacándose por ser altamente competitiva, confiable, sostenible, buscando satisfacer las necesidades de sus clientes de manera oportuna e integral, logrando el reconocimiento y posicionamiento a nivel nacional.
            ",

            'img_url_fondo'=>'assets/images/bg/banner9.jpg',
            'img_url'=>'assets/images/bg.jpg',
        ]);
        ///END Quienes somos ///
    // nuestro servicios//
        nuestro_servicio::create([
            'title_ns'=>'Nuestros Servicios',
            'subtitle_ns'=>'Asesorías Financieras y Administrativas, Consultarías',
        ]);

    // end nuestro servicios//


// descargas//
        descargas::create([
            'title1'=>'Descargas',
            'title2'=>'Descargas',
            'sub_title'=>'Contamos con nuestro sistema de descargas en línea para que nuestros clientes puedan descargar los formatos y formularios requeridos.',
            'img_url_fondo'=>'assets/images/bg/banner.jpg',
        ]);

            descargas_items::create([
                'title1'=>'Ayuda PYC Municipios',
                'description'=>'CGR Formularios',
                'url_archivo'=>'assets/descargas/Ayuda_CGR_SGR_SEGUNDO_NIVEL.xlsx'
            ]);
            descargas_items::create([
                'title1'=>'Ayudas para Municipios',
                'description'=>'CGR Formularios',
                'url_archivo'=>'assets/descargas/Ayuda_CGR_SGR_SEGUNDO_NIVEL.xlsx'
            ]);
            descargas_items::create([
                'title1'=>'Cierre Fiscal',
                'description'=>'FUT Formularios',
                'url_archivo'=>'assets/descargas/Ayuda_CGR_SGR_SEGUNDO_NIVEL.xlsx'
            ]);
            descargas_items::create([
                'title1'=>'Cuentas por Pagar',
                'description'=>'FUT Formularios',
                'url_archivo'=>'assets/descargas/Ayuda_CGR_SGR_SEGUNDO_NIVEL.xlsx'
            ]);
            descargas_items::create([
                'title1'=>'Deuda',
                'description'=>'FUT Formularios',
                'url_archivo'=>'assets/descargas/Ayuda_CGR_SGR_SEGUNDO_NIVEL.xlsx'
            ]);
            descargas_items::create([
                'title1'=>'Ejecucion Fondo Salud',
                'description'=>'FUT Formularios',
                'url_archivo'=>'assets/descargas/Ayuda_CGR_SGR_SEGUNDO_NIVEL.xlsx'
            ]);
            descargas_items::create([
                'title1'=>'Excedentes Liquidez',
                'description'=>'FUT Formularios',
                'url_archivo'=>'assets/descargas/Ayuda_CGR_SGR_SEGUNDO_NIVEL.xlsx'
            ]);

// end descargas//


        // contactenos//
        contactos::create([
            'title1'=>'Contáctenos',
            'img_url_fondo'=>'assets/images/bg/banner10.jpg',
            'dirrecion'=>'Carrera 73 Nº45e–04, Edificio Condominio Castelfuerte II, Oficina 103, Med–Colombia',
            'numerotelefono1'=>'57 312 831 99 15',
            'numerotelefono2'=>'57 312 834 61 67',
            'correo_electronico'=>'info@grupoasesorengestion.com',
            'link_facebook'=>'https://www.facebook.com/GrupoAsesorEnGestion/',
            'link_twitter'=>'https://www.twitter.com/GAGLtda',
            'link_instagram'=>'https://www.instagram.com/grupoasesorengestion/'
        ]);
        //END contactenos//
        ///Clientes ///
        Clientes::create([
            'title1'=>'Clientes',
            'title2'=>'Clientes',
            'sub_title'=>'Desde el 2004 venimos acompañado a nuestros clientes, en el desarrollo de diferentes proyectos, en las áreas financieras, administrativas, contribuyendo con nuestros conocimientos y experiencia en el éxito de nuestros clientes.',
            'content'=>'<p>Se ha realizado acompañamiento a los clientes con nuestros conocimientos y experiencia, en la implementación y fortalecimiento de diferentes procesos en el área financiera y administrativa, lo que ha facilitado el cumplimiento de sus objetivos y misión institucional. Apoyando los procesos contables que permiten empresas públicas y privadas transparentes, organizada y dentro del cumplimiento de la Ley.</p>',
            'img_url_fondo'=>'assets/images/bg/banner.jpg',
        ]);

            Clientes_items::create([
                'title1'=>'Municipio de Itaguí',
                'img_url'=>'assets/images/clientes/1.jpg',
            ]);
            Clientes_items::create([
                'title1'=>'Municipio de Arboletes',
                'img_url'=>'assets/images/clientes/2.jpg',
            ]);
            Clientes_items::create([
                'title1'=>'Municipio de Peque',
                'img_url'=>'assets/images/clientes/4.jpg',
            ]);


    }

}
