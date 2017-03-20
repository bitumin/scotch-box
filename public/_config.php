<?php
unset($CFG);
global $CFG;
$CFG = new stdClass();

// Database
$CFG->dbtype = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost = 'localhost';
$CFG->dbname = 'moodle';
$CFG->dbuser = 'root';
$CFG->dbpass = 'root';
$CFG->prefix = 'mdl_';
$CFG->dboptions = [
    'dbpersist' => false,
    'dbsocket' => '/private/tmp/mysql.sock',
    'dbport' => 3306,
];

// Instancia
$CFG->admin = 'admin';
$CFG->wwwroot = 'http://192.168.33.10/';
$CFG->dirroot = '/var/www/public';
$CFG->dataroot = '/var/www/private/moodledata';
$CFG->directorypermissions = 02777;
$CFG->divertallemailsto = 'mmoriana@cvaconsulting.com';
$CFG->disableonclickaddoninstall = true;
$CFG->defaultblocks_override = 'course_overview';
$CFG->cachejs = false;
$CFG->runclamonupload = 0;
$CFG->pathtoclam = '/opt/local/bin/clamscan';
$CFG->demosite = false;
$CFG->cidisabled = false;
//$CFG->sessiontimeout = 1;
//$CFG->lang = 'en';
//$CFG->theme = 'udp';
//$CFG->theme = 'webbook';

// Phpunit
$CFG->phpunit_prefix = 'phpu_';
$CFG->phpunit_dataroot = '/var/www/private/phpu_moodledata';
$CFG->phpunit_dbtype = 'mysqli';
$CFG->phpunit_dblibrary = 'native';
$CFG->phpunit_dbhost = 'localhost';
$CFG->phpunit_dbname = 'testmoodle';
$CFG->phpunit_dbuser = 'root';
$CFG->phpunit_dbpass = 'root';

$env = 'es-pre'; // Env
$debug = 0; // Debug mode
$cachewebbookpath = '/var/www/private/cachewebbook'; // Webbook Cache dir
$enablesaviaassistant = 1; // Savia assistant
$headerslogan = 0; // Header SM slogan

if (!empty($debug)) {
    @error_reporting(E_ALL | E_STRICT);
    @ini_set('display_errors', '1');
    $CFG->debug = (E_ALL | E_STRICT);
    $CFG->debugdisplay = 1;
}

if (!empty($env)) {
    switch ($env) {
        case 'demo':
            $CFG->demosite = true;
            $CFG->cidisabled = true;
            $CFG->forced_plugin_settings = array(
                'webbooksso_school' => array(
                    'apismauthorization' => '820d5586bb7a48c5a387079468ca01b1',
                    'apismdominio' => 'api.grupo-sm.com'
                ),
                'local_webbook' => array(
                    'alfrescowslibro' => 'http://moodlep:moodlep@alfresco.ediciones-sm.com.mx/alfresco/service/sm/consulta-curso?codSAP',
                    'alfrescowspiezas' => 'http://moodlep:moodlep@alfresco.ediciones-sm.com.mx/alfresco/service/sm/consulta-pieza?uuid',
                    'alfrescoapi' => 'http://alfresco.ediciones-sm.com.mx/alfresco/service/api/login?u=moodlep&pw=moodlep',
                    'environment' => 2,
                    'usemoodledata' => 0,
                    'headerslogan' => 0,
                    'saviaassistant' => 0,
                    'template' => 0,
                    'limitcachebook' => -1,
                    'limitcachepiece' => -1,
                    'assessmentscale' => 100,
                )
            );
            break;
        case 'es-pre':
            $CFG->forced_plugin_settings = array(
                'webbooksso_school' => array(
//                    'apismauthorization' => 'evaclmexl23a9as79g9ghjy5m32pq', // s2
                    'apismauthorization' => 'evamadl23a9as79g9ghjy5m32pq', // s1
                    'apismdominio' => 'apiprepro.grupo-sm.com'
                ),
                'local_webbook' => array(
                    'environment' => 1,
                    // Amazon ismeduca
                    'alfrescowslibro' => 'http://moodlep:moodlep@alfresco.ismeduca.com/alfresco/service/sm/consulta-curso?codSAP',
                    'alfrescowspiezas' => 'http://moodlep:moodlep@alfresco.ismeduca.com/alfresco/service/sm/consulta-pieza?uuid',
                    'alfrescoapi' => 'http://alfresco.ismeduca.com/alfresco/service/api/login?u=moodlep&pw=moodlep',
                    // Amazon grupo-sm
//                    'alfrescowslibro' => 'http://moodlep:moodlep@alfresco.grupo-sm.com/alfresco/service/sm/consulta-curso?codSAP',
//                    'alfrescowspiezas' => 'http://moodlep:moodlep@alfresco.grupo-sm.com/alfresco/service/sm/consulta-pieza?uuid',
//                    'alfrescoapi' => 'http://alfresco.grupo-sm.com/alfresco/service/api/login?u=moodlep&pw=moodlep',
                    // SCW
//                    'alfrescowslibro' => 'http://sescscwazu01.gesm.net:3000/api/course/savia/?cod',
//                    'alfrescowspiezas' => 'http://sescscwazu01.gesm.net:3000/api/piece/savia/?uuid',
//                    'alfrescoapi' => 'http://sescscwazu01.gesm.net:3000/api/ticket?xml=true',
                ),
            );
            break;
        case 'es-pro':
            $CFG->forced_plugin_settings = array(
                'webbooksso_school' => array(
                    'apismauthorization' => 'g8e9b4h2c3v7x0q8q5i4f2d0j9a6s6s5', // s7
//                    'apismauthorization' => 'm7x6v0f8u0x0f6w6r5u6u4k4y5m0l4l8',
                    'apismdominio' => 'api.grupo-sm.com'
                ),
                'local_webbook' => array(
                    'environment' => 1,
                    'alfrescowslibro' => 'http://scw.smsaviadigital.com/api/course/savia?cod',
                    'alfrescowspiezas' => 'http://scw.smsaviadigital.com/api/piece/savia/?uuid',
                    'alfrescoapi' => 'http://scw.smsaviadigital.com/api/ticket?xml=true',
                ),
            );
            break;
        case 'co-pro':
            $CFG->forced_plugin_settings = array(
                'webbooksso_school' => array(
                    'apismauthorization' => '820d5586bb7a48c5a387079468ca01b1',
                    'apismdominio' => 'api.grupo-sm.com'
                ),
                'local_webbook' => array(
                    'environment' => 1,
                    'template' => 2,
                    'assessmentscale' => 5,
                    'alfrescowslibro' => 'http://moodlep:moodlep@alfresco.ediciones-sm.com.mx/alfresco/service/sm/consulta-curso?codSAP',
                    'alfrescowspiezas' => 'http://moodlep:moodlep@alfresco.ediciones-sm.com.mx/alfresco/service/sm/consulta-pieza?uuid',
                    'alfrescoapi' => 'http://alfresco.ediciones-sm.com.mx/alfresco/service/api/login?u=moodlep&pw=moodlep',
                ),
            );
            break;
        case 'co-pro-alt':
            $CFG->forced_plugin_settings = array(
                'webbooksso_school' => array(
                    'apismauthorization' => '820d5586bb7a48c5a387079468ca01b1',
                    'apismdominio' => 'api.grupo-sm.com'
                ),
                'local_webbook' => array(
                    'environment' => 1,
                    'template' => 2,
                    'assessmentscale' => 5,
                    'alfrescowslibro' => 'http://ltm-scw.smsaviadigital.com/api/course/co_conecta/?cod',
                    'alfrescowspiezas' => 'http://ltm-scw.smsaviadigital.com/api/piece/co_conecta/?uuid',
                    'alfrescoapi' => 'http://ltm-scw.smsaviadigital.com/api/ticket/?xml=true',
                ),
            );
            break;
        case 'co-pre':
            $CFG->forced_plugin_settings = array(
                'webbooksso_school' => array(
                    'apismauthorization' => 'conectaco23a9as79g9ghjy5m32pq',
                    'apismdominio' => 'apiprepro.grupo-sm.com'
                ),
                'local_webbook' => array(
                    'environment' => 1,
                    'template' => 2,
                    'assessmentscale' => 5,
                    'alfrescowslibro' => 'http://moodlep:moodlep@alfresco.smit.com.mx/alfresco/service/sm/consulta-curso?codSAP',
                    'alfrescowspiezas' => 'http://moodlep:moodlep@alfresco.smit.com.mx/alfresco/service/sm/consulta-pieza?uuid',
                    'alfrescoapi' => 'http://alfresco.smit.com.mx/alfresco/service/api/login?u=moodlep&pw=moodlep',
                ),
            );
            break;
    }
}

// Extra local webbook config options
$CFG->forced_plugin_settings['local_webbook']['usemoodledata'] = 0;
$CFG->forced_plugin_settings['local_webbook']['headerslogan'] = $headerslogan;
$CFG->forced_plugin_settings['local_webbook']['sharedcachepathbook'] = "{$cachewebbookpath}/books";
$CFG->forced_plugin_settings['local_webbook']['sharedcachepathpiece'] = "{$cachewebbookpath}/pieces";
$CFG->forced_plugin_settings['local_webbook']['saviaassistant'] = (isset($CFG->theme) && $CFG->theme === 'udp') ? 0 : $enablesaviaassistant;
unset($debug, $enablesaviaassistant, $cachewebbookpath);

require_once __DIR__ . '/lib/setup.php';
