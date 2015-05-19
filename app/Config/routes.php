<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...


 */

if (Configure::read('Application.status')) {
	Router::connect('/', array('controller' => 'users', 'action' => 'login'));
}

// Router::connect('/home', array('controller' => 'items', 'action' => 'index'));

/* Profile page */
Router::connect('/me', array('controller' => 'users', 'action' => 'profile'));
/* Edit profile page */
Router::connect('/me/edit', array('controller' => 'users', 'action' => 'edit'));

Router::connect('/sign-up', array('controller' => 'users', 'action' => 'add'));

Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
Router::connect('/', array('controller' => 'items', 'action' => 'index'));
Router::connect('/recent', array('controller' => 'items', 'action' => 'recent'));
Router::connect('/meta', array('controller' => 'items', 'action' => 'meta'));
Router::connect('/must-read', array('controller' => 'items', 'action' => 'must_read'));

Router::connect('/questions', array('controller' => 'items', 'action' => 'questions'));
Router::connect('/articles', array('controller' => 'items', 'action' => 'articles'));
Router::connect('/admin/users', array('controller' => 'usersadmin', 'action' => 'index'));
Router::connect('/admin/items', array('controller' => 'itemsadmin', 'action' => 'index'));

Router::connect(
	'/opauth-complete/*',
	array('controller' => 'users', 'action' => 'opauth_complete')
);

// if they don't have access yet - send them back to the thanks page
Router::connect('/thanks', array('controller' => 'users', 'action' => 'thanks'));
Router::connect('/welcome', array('controller' => 'pages', 'action' => 'welcome'));

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
// Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
