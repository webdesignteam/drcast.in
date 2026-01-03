<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'Home';
$route['login'] = 'Home/login';
$route['logout'] = 'Home/logout';
$route['reset-password'] = 'Home/reset_password';
$route['dashboard'] = 'Home/dashboard';

//Admin
$route['users'] = 'Home/users';
$route['logs-users'] = 'Home/logs_users';
$route['create-user'] = 'Home/create_user';
$route['technicians'] = 'Home/technicians';
$route['organizers'] = 'Home/organizers';

//Employe
$route['request-event'] = 'Home/request_event';
$route['events'] = 'Home/events';

$route['participants'] = 'Home/participants_list';
$route['divisions'] = 'Home/division_list';
$route['queries'] = 'Home/queries_list';
$route['analytics'] = 'Home/analytics_list';
$route['sms-logs'] = 'Home/sms_logs';
$route['email-logs'] = 'Home/email_logs';





//Admin & Employe
$route['doctors'] = 'Home/doctors';
$route['doctor-create'] = 'Home/doctor_create';

//Notifications
$route['sms'] = 'Sms/send_sms';

// $route['success/(:any)/(:any)'] = 'Home/success';
// 
// $route['request-webinar-design'] = 'Home/request_webinar_design';


// 
// 
// $route['requests'] = 'Home/requests';
// $route['webinars'] = 'Home/webinarlist';
// $route['enrollments'] = 'Home/enrollmentlist';
// $route['exportsmsenrolled'] = 'Home/exportsmsenrolled';
// $route['viewerlogs'] = 'Home/viewerlogslist';
// $route['exportsmsattendees'] = 'Home/exportsmsattendees';

// //Cron jobs
// $route['sendsmsalerts'] = 'Home/sendsmsalerts';




// $route['webinar-create'] = 'Home/webinar_create';

// $route['queries'] = 'Home/queries';
// $route['participants'] = 'Home/participants';
// $route['analytics'] = 'Home/analytics';
// $route['email-logs'] = 'Home/email_logs';
// $route['sms-logs'] = 'Home/sms_logs';

// $route['settings'] = 'Home/settings';
// $route['webinar-update'] = 'Home/webinar_update';

// $route['technicians'] = 'Home/technicians';
// $route['organizers'] = 'Home/organizers';
// $route['organizer-create'] = 'Home/organizer_create';
// $route['technician-create'] = 'Home/technician_create';
// $route['divisions'] = 'Home/divisions';
// $route['manage-account'] = 'Home/manageaccount';

$route['404_override'] = 'my404';