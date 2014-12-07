<?php
/*
 * Copyright 2010 Manoj Madhavan.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**************************************************************/
//Define path related to www or public_html or htdocs folder
define ('SITENAME', 'PropertySite');
define ('SITEPATH', './');
define ('SITEPATHLOCAL','http://localhost/'.SITENAME.'/');
define ('APPLICATIONPATH' , SITEPATH.'application/');
define ('APPLICATIONMVC', APPLICATIONPATH.'/MVC/');
define ('EZYLOGPATH', APPLICATIONPATH.'temp/logs');
define ('EZYCACHEPATH', APPLICATIONPATH.'temp/cache/');
define ('EZYPHPPATH', SITEPATH.'EZYPhp/');
define ('INCLUDEPATH', APPLICATIONPATH.'include');

/**************************************************************/
//Definations for MVC settings
define ('PATHTOMODEL', APPLICATIONMVC.'/models/');
define ('PATHTOVIEW', APPLICATIONMVC.'/views/');
define ('PATHTOCONTROLLER', APPLICATIONMVC.'/controllers/');

/**************************************************************/
//Definations for Debug and Log settings
define ('EZYDEBUG', TRUE);
define ('EZYLOG', TRUE);

/**************************************************************/
//Definations for Database settings
//define ('EZYDBTYPE', 'MySQL');
define ('EZYSERVERNAME','localhost');
define ('EZYDBNAME', 'PropertySite');
define ('EZYDBUSERNAME', 'root');
define ('EZYDBPASSWORD', '');

/**************************************************************/
//Definations for Cache settings
define ('EZYCACHE', FALSE);
define ('EZYDBCACHE', FALSE);

/**************************************************************/
//Definations for Email settings
define ('EZYEMAIL', FALSE);
define ('EZYEMAILUSERDEFINED', FALSE);
define ('EZYEMAILFROM', FALSE);
define ('EZYEMAILUSERNAME', FALSE);
define ('EZYEMAILPASSWORD', FALSE);

/**************************************************************/
//Definations for SMS settings
define ('EZYSMS', FALSE);
define ('EZYSMSUSERDEFINED', FALSE);
define ('EZYSMSURL', '');
define ('EZYSMSTYPE', 'GET');
define ('EZYSMSUSERNAME', '');
define ('EZYSMSPASSWORD', '');
define ('EZYSMSSENDERID', '');
?>