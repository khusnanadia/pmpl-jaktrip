<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

|	http://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There area two reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router what URI segments to use if those provided

| in the URL cannot be matched to a valid route.

|

*/



$route['default_controller'] = "welcome";

$route['404_override'] = '';



$route['home'] = 'HomeCtr';

$route['home/(:any)'] = 'HomeCtr/index/$1';

$route['trip'] = 'SearchCtr';

$route['trip/owntrip'] = 'searchCtr/SearchWithoutBudget';

$route['trip/recommendation'] = 'searchCtr/SearchWithinBudgetRec';

$route['trip/view'] = 'ViewTripCtr'; 

$route['trip/savetrip'] = 'ViewTripCtr/saveTrip'; 

$route['allplaces'] = 'AllPlacesCtr';

$route['allplaces/send'] = 'AllPlacesCtr/sendSuggestion'; 

$route['place/(:any)'] = 'PlaceCtr/index/$1';

$route['place/review/(:any)'] = 'PlaceCtr/rating/$1';

$route['flag/(:any)'] = 'FlagCtr/index/$1';

$route['flag/review/(:any)'] = 'FlagCtr/rating/$1';

$route['flag/spam/(:any)'] = 'FlagCtr/spamreport/$1/$2';

$route['allpromo'] = 'AllPromosCtr';

$route['promo/(:any)'] = 'PromoCtr/index/$1';



$route['faq'] = 'FaqCtr';

$route['contactus'] = 'FeedbackCtr'; 

$route['contactus/send'] = 'FeedbackCtr/submitForm';



$route['admin/members'] = 'ManageMemberCtr';

$route['admin/places'] = 'ManageTourAttrCtr';



$route['admin/places/edit/(:any)'] = 'ManageTourAttrCtr/edit/$1';

$route['admin/places/delete/(:any)'] = 'ManageTourAttrCtr/del/$1';

$route['admin/addnewplace'] = 'TourAttrCtr';

$route['admin/spam'] = 'SpamCtr';

$route['admin/statistics'] = 'StatisticCtr';

$route['admin/suggestions'] = 'SuggestionCtr';

$route['admin/feedback'] = 'FeedbackAdmCtr';

$route['admin/promo'] = 'ManagePromoCtr';

$route['admin/addnewpromo'] = 'AddPromoCtr';

$route['admin/promo/delete/(:any)'] = 'ManagePromoCtr/del/$1';

$route['admin/promo/edit/(:any)'] = 'ManagePromoCtr/edit/$1';



$route['user'] = 'UsersCtr';

$route['user/edit'] = 'UsersCtr/edit';

$route['user/review/delete/(:num)'] = 'UsersCtr/deleteReview/$1';

$route['user/trip/setvisited/(:any)'] = 'UsersCtr/setVisited/$1/$2';

$route['user/trip/unsetvisited/(:any)'] = 'UsersCtr/unsetVisited/$1/$2';

$route['user/trip/viewsavedtrip/(:any)'] = 'UsersCtr/viewSavedTrip/$1';

$route['user/trip/deletetrip/(:any)'] = 'UsersCtr/deleteTrip/$1';



$route['register'] = 'RegisterCtr'; 

$route['register/send'] = 'RegisterCtr/addMember'; 

$route['login'] = 'LoginCtr/checkLogin'; 

$route['login/forgotpassword'] = 'ForgotPassCtr';

$route['login/forgotpassword/check'] = 'ForgotPassCtr/processForgotPassword';

$route['successLoginFB'] = 'LoginCtr/successLoginFB';

$route['admin/suggestions/delete/(:any)'] = 'SuggestionCtr/del/$1';

$route['logout'] = 'LoginCtr/logout';





// $route['PlaceCtr/(:any)'] = 'PlaceCtr/index/$1';

// $route['ReviewCtr/del/(:any)/(:num)'] = 'ReviewCtr/del/$1/$2';

// $route['PlaceCtr/rating/(:any)'] = 'PlaceCtr/rating/$1';

// $route['AllPlacesCtr/searchwisataCatLocKey/(:any)/(:any)/(:any)'] = 'AllPlacesCtr/searchwisataCatLocKey/$1/$2/$3';

//$route['ReviewCtr/(:any)'] = 'ReviewCtr/index/$1';

//$route['DetailCtr/getdetail/(:any)'] = 'DetailCtr/index/$1';

//$route['controllername/(:any)/(:any)'] = 'ddd/index/$1/$2';

//$route['controllername/(:any)//(:any)'] = 'ddd/index/$1/$3';

//$route['controllername//(:any)/(:any)'] = 'ddd/index/$2/$3';

//$route['controllername/(:any)'] = 'ddd/index/$1';



//$route['search/(:any)'] = 'search/index/$1';

$route['AllPlacesCtr/category/place/(:any)'] = 'PlaceCtr/index/$1';

$route['admin/manageMemberCtr/del/(:any)'] = 'ManageMemberCtr/del/$1'; 

$route['index.php/ManageTourAttrCtr/searchtour/(:any)'] = 'ManageTourAttrCtr/searchtour/$1'; 

$route['flag/FlagCtr/spamreport/(:num)'] = 'FlagCtr/spamreport/$1'; 

$route['flag/(:any)/addwishlist'] = 'FlagCtr/addWishlist/$1'; 

$route['flag/(:any)/removewishlist'] = 'FlagCtr/removeWishlist/$1'; 

$route['flag/(:any)/addvisited'] = 'FlagCtr/addVisited/$1'; 

$route['flag/(:any)/removevisited'] = 'FlagCtr/removeVisited/$1'; 

$route['place/report/(:num)'] = 'PlaceCtr/spamreport/$1'; 

$route['place/(:any)/addwishlist'] = 'PlaceCtr/addWishlist/$1'; 

$route['place/(:any)/removewishlist'] = 'PlaceCtr/removeWishlist/$1'; 

$route['place/(:any)/addvisited'] = 'PlaceCtr/addVisited/$1'; 

$route['place/(:any)/removevisited'] = 'PlaceCtr/removeVisited/$1'; 

$route['user/addwishlist'] = 'UsersCtr/addWishlist/$1'; 

$route['user/removewishlist'] = 'UsersCtr/removeWishlist/$1'; 

$route['profile/viewtrip/(:any)'] = 'UsersCtr/viewSavedTripOther/$1/$2';
$route['profile/(:any)'] = 'UsersCtr/viewOtherUser/$1';

/* End of file routes.php */

/* Location: ./application/config/routes.php */