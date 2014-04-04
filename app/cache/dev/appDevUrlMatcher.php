<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // login
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_login;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'login');
            }

            return array (  '_controller' => 'Application\\ProjectBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
        }
        not_login:

        if (0 === strpos($pathinfo, '/admin')) {
            // sonata_admin_custompage
            if ($pathinfo === '/admin/custompage') {
                return array (  '_controller' => 'Application\\DashboardBundle\\Controller\\AdminController::custompageAction',  '_route' => 'sonata_admin_custompage',);
            }

            // application_dashboard_dashboardscripexecutor_index
            if ($pathinfo === '/admin/exec') {
                return array (  '_controller' => 'Application\\DashboardBundle\\Controller\\DashboardScripExecutorController::indexAction',  '_route' => 'application_dashboard_dashboardscripexecutor_index',);
            }

            if (0 === strpos($pathinfo, '/admin/page_tree_')) {
                // page_tree_up
                if (0 === strpos($pathinfo, '/admin/page_tree_up') && preg_match('#^/admin/page_tree_up/(?P<page_id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_tree_up')), array (  '_controller' => 'Application\\DashboardBundle\\Controller\\PageTreeSortController::upAction',));
                }

                // page_tree_down
                if (0 === strpos($pathinfo, '/admin/page_tree_down') && preg_match('#^/admin/page_tree_down/(?P<page_id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_tree_down')), array (  '_controller' => 'Application\\DashboardBundle\\Controller\\PageTreeSortController::downAction',));
                }

            }

            // sonata_admin_redirect
            if (rtrim($pathinfo, '/') === '/admin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'sonata_admin_redirect');
                }

                return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => 'sonata_admin_dashboard',  'permanent' => 'true',  '_route' => 'sonata_admin_redirect',);
            }

            // sonata_admin_dashboard
            if ($pathinfo === '/admin/dashboard') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::dashboardAction',  '_route' => 'sonata_admin_dashboard',);
            }

            if (0 === strpos($pathinfo, '/admin/core')) {
                // sonata_admin_retrieve_form_element
                if ($pathinfo === '/admin/core/get-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:retrieveFormFieldElementAction',  '_route' => 'sonata_admin_retrieve_form_element',);
                }

                // sonata_admin_append_form_element
                if ($pathinfo === '/admin/core/append-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:appendFormFieldElementAction',  '_route' => 'sonata_admin_append_form_element',);
                }

                // sonata_admin_short_object_information
                if (0 === strpos($pathinfo, '/admin/core/get-short-object-description') && preg_match('#^/admin/core/get\\-short\\-object\\-description(?:\\.(?P<_format>html|json))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sonata_admin_short_object_information')), array (  '_controller' => 'sonata.admin.controller.admin:getShortObjectDescriptionAction',  '_format' => 'html',));
                }

                // sonata_admin_set_object_field_value
                if ($pathinfo === '/admin/core/set-object-field-value') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:setObjectFieldValueAction',  '_route' => 'sonata_admin_set_object_field_value',);
                }

            }

            // sonata_admin_search
            if ($pathinfo === '/admin/search') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::searchAction',  '_route' => 'sonata_admin_search',);
            }

            if (0 === strpos($pathinfo, '/admin/application/dashboard')) {
                if (0 === strpos($pathinfo, '/admin/application/dashboard/carcolor')) {
                    // admin_application_dashboard_carcolor_list
                    if ($pathinfo === '/admin/application/dashboard/carcolor/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.carcolor',  '_sonata_name' => 'admin_application_dashboard_carcolor_list',  '_route' => 'admin_application_dashboard_carcolor_list',);
                    }

                    // admin_application_dashboard_carcolor_create
                    if ($pathinfo === '/admin/application/dashboard/carcolor/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.carcolor',  '_sonata_name' => 'admin_application_dashboard_carcolor_create',  '_route' => 'admin_application_dashboard_carcolor_create',);
                    }

                    // admin_application_dashboard_carcolor_batch
                    if ($pathinfo === '/admin/application/dashboard/carcolor/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.carcolor',  '_sonata_name' => 'admin_application_dashboard_carcolor_batch',  '_route' => 'admin_application_dashboard_carcolor_batch',);
                    }

                    // admin_application_dashboard_carcolor_edit
                    if (preg_match('#^/admin/application/dashboard/carcolor/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_carcolor_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.carcolor',  '_sonata_name' => 'admin_application_dashboard_carcolor_edit',));
                    }

                    // admin_application_dashboard_carcolor_delete
                    if (preg_match('#^/admin/application/dashboard/carcolor/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_carcolor_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.carcolor',  '_sonata_name' => 'admin_application_dashboard_carcolor_delete',));
                    }

                    // admin_application_dashboard_carcolor_show
                    if (preg_match('#^/admin/application/dashboard/carcolor/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_carcolor_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.carcolor',  '_sonata_name' => 'admin_application_dashboard_carcolor_show',));
                    }

                    // admin_application_dashboard_carcolor_export
                    if ($pathinfo === '/admin/application/dashboard/carcolor/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.carcolor',  '_sonata_name' => 'admin_application_dashboard_carcolor_export',  '_route' => 'admin_application_dashboard_carcolor_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/application/dashboard/user')) {
                    // admin_application_dashboard_user_list
                    if ($pathinfo === '/admin/application/dashboard/user/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.user',  '_sonata_name' => 'admin_application_dashboard_user_list',  '_route' => 'admin_application_dashboard_user_list',);
                    }

                    // admin_application_dashboard_user_create
                    if ($pathinfo === '/admin/application/dashboard/user/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.user',  '_sonata_name' => 'admin_application_dashboard_user_create',  '_route' => 'admin_application_dashboard_user_create',);
                    }

                    // admin_application_dashboard_user_batch
                    if ($pathinfo === '/admin/application/dashboard/user/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.user',  '_sonata_name' => 'admin_application_dashboard_user_batch',  '_route' => 'admin_application_dashboard_user_batch',);
                    }

                    // admin_application_dashboard_user_edit
                    if (preg_match('#^/admin/application/dashboard/user/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_user_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.user',  '_sonata_name' => 'admin_application_dashboard_user_edit',));
                    }

                    // admin_application_dashboard_user_delete
                    if (preg_match('#^/admin/application/dashboard/user/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_user_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.user',  '_sonata_name' => 'admin_application_dashboard_user_delete',));
                    }

                    // admin_application_dashboard_user_show
                    if (preg_match('#^/admin/application/dashboard/user/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_user_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.user',  '_sonata_name' => 'admin_application_dashboard_user_show',));
                    }

                    // admin_application_dashboard_user_export
                    if ($pathinfo === '/admin/application/dashboard/user/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.user',  '_sonata_name' => 'admin_application_dashboard_user_export',  '_route' => 'admin_application_dashboard_user_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/application/dashboard/department')) {
                    // admin_application_dashboard_department_list
                    if ($pathinfo === '/admin/application/dashboard/department/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.department',  '_sonata_name' => 'admin_application_dashboard_department_list',  '_route' => 'admin_application_dashboard_department_list',);
                    }

                    // admin_application_dashboard_department_create
                    if ($pathinfo === '/admin/application/dashboard/department/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.department',  '_sonata_name' => 'admin_application_dashboard_department_create',  '_route' => 'admin_application_dashboard_department_create',);
                    }

                    // admin_application_dashboard_department_batch
                    if ($pathinfo === '/admin/application/dashboard/department/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.department',  '_sonata_name' => 'admin_application_dashboard_department_batch',  '_route' => 'admin_application_dashboard_department_batch',);
                    }

                    // admin_application_dashboard_department_edit
                    if (preg_match('#^/admin/application/dashboard/department/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_department_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.department',  '_sonata_name' => 'admin_application_dashboard_department_edit',));
                    }

                    // admin_application_dashboard_department_delete
                    if (preg_match('#^/admin/application/dashboard/department/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_department_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.department',  '_sonata_name' => 'admin_application_dashboard_department_delete',));
                    }

                    // admin_application_dashboard_department_show
                    if (preg_match('#^/admin/application/dashboard/department/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_department_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.department',  '_sonata_name' => 'admin_application_dashboard_department_show',));
                    }

                    // admin_application_dashboard_department_export
                    if ($pathinfo === '/admin/application/dashboard/department/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.department',  '_sonata_name' => 'admin_application_dashboard_department_export',  '_route' => 'admin_application_dashboard_department_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/application/dashboard/role')) {
                    // admin_application_dashboard_role_list
                    if ($pathinfo === '/admin/application/dashboard/role/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.role',  '_sonata_name' => 'admin_application_dashboard_role_list',  '_route' => 'admin_application_dashboard_role_list',);
                    }

                    // admin_application_dashboard_role_create
                    if ($pathinfo === '/admin/application/dashboard/role/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.role',  '_sonata_name' => 'admin_application_dashboard_role_create',  '_route' => 'admin_application_dashboard_role_create',);
                    }

                    // admin_application_dashboard_role_batch
                    if ($pathinfo === '/admin/application/dashboard/role/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.role',  '_sonata_name' => 'admin_application_dashboard_role_batch',  '_route' => 'admin_application_dashboard_role_batch',);
                    }

                    // admin_application_dashboard_role_edit
                    if (preg_match('#^/admin/application/dashboard/role/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_role_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.role',  '_sonata_name' => 'admin_application_dashboard_role_edit',));
                    }

                    // admin_application_dashboard_role_delete
                    if (preg_match('#^/admin/application/dashboard/role/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_role_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.role',  '_sonata_name' => 'admin_application_dashboard_role_delete',));
                    }

                    // admin_application_dashboard_role_show
                    if (preg_match('#^/admin/application/dashboard/role/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_role_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.role',  '_sonata_name' => 'admin_application_dashboard_role_show',));
                    }

                    // admin_application_dashboard_role_export
                    if ($pathinfo === '/admin/application/dashboard/role/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.role',  '_sonata_name' => 'admin_application_dashboard_role_export',  '_route' => 'admin_application_dashboard_role_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/application/dashboard/sign')) {
                    if (0 === strpos($pathinfo, '/admin/application/dashboard/signplace')) {
                        // admin_application_dashboard_signplace_list
                        if ($pathinfo === '/admin/application/dashboard/signplace/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.signplace',  '_sonata_name' => 'admin_application_dashboard_signplace_list',  '_route' => 'admin_application_dashboard_signplace_list',);
                        }

                        // admin_application_dashboard_signplace_create
                        if ($pathinfo === '/admin/application/dashboard/signplace/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.signplace',  '_sonata_name' => 'admin_application_dashboard_signplace_create',  '_route' => 'admin_application_dashboard_signplace_create',);
                        }

                        // admin_application_dashboard_signplace_batch
                        if ($pathinfo === '/admin/application/dashboard/signplace/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.signplace',  '_sonata_name' => 'admin_application_dashboard_signplace_batch',  '_route' => 'admin_application_dashboard_signplace_batch',);
                        }

                        // admin_application_dashboard_signplace_edit
                        if (preg_match('#^/admin/application/dashboard/signplace/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_signplace_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.signplace',  '_sonata_name' => 'admin_application_dashboard_signplace_edit',));
                        }

                        // admin_application_dashboard_signplace_delete
                        if (preg_match('#^/admin/application/dashboard/signplace/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_signplace_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.signplace',  '_sonata_name' => 'admin_application_dashboard_signplace_delete',));
                        }

                        // admin_application_dashboard_signplace_show
                        if (preg_match('#^/admin/application/dashboard/signplace/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_signplace_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.signplace',  '_sonata_name' => 'admin_application_dashboard_signplace_show',));
                        }

                        // admin_application_dashboard_signplace_export
                        if ($pathinfo === '/admin/application/dashboard/signplace/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.signplace',  '_sonata_name' => 'admin_application_dashboard_signplace_export',  '_route' => 'admin_application_dashboard_signplace_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/application/dashboard/signtype')) {
                        // admin_application_dashboard_signtype_list
                        if ($pathinfo === '/admin/application/dashboard/signtype/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.signtype',  '_sonata_name' => 'admin_application_dashboard_signtype_list',  '_route' => 'admin_application_dashboard_signtype_list',);
                        }

                        // admin_application_dashboard_signtype_create
                        if ($pathinfo === '/admin/application/dashboard/signtype/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.signtype',  '_sonata_name' => 'admin_application_dashboard_signtype_create',  '_route' => 'admin_application_dashboard_signtype_create',);
                        }

                        // admin_application_dashboard_signtype_batch
                        if ($pathinfo === '/admin/application/dashboard/signtype/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.signtype',  '_sonata_name' => 'admin_application_dashboard_signtype_batch',  '_route' => 'admin_application_dashboard_signtype_batch',);
                        }

                        // admin_application_dashboard_signtype_edit
                        if (preg_match('#^/admin/application/dashboard/signtype/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_signtype_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.signtype',  '_sonata_name' => 'admin_application_dashboard_signtype_edit',));
                        }

                        // admin_application_dashboard_signtype_delete
                        if (preg_match('#^/admin/application/dashboard/signtype/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_signtype_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.signtype',  '_sonata_name' => 'admin_application_dashboard_signtype_delete',));
                        }

                        // admin_application_dashboard_signtype_show
                        if (preg_match('#^/admin/application/dashboard/signtype/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_signtype_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.signtype',  '_sonata_name' => 'admin_application_dashboard_signtype_show',));
                        }

                        // admin_application_dashboard_signtype_export
                        if ($pathinfo === '/admin/application/dashboard/signtype/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.signtype',  '_sonata_name' => 'admin_application_dashboard_signtype_export',  '_route' => 'admin_application_dashboard_signtype_export',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/application/dashboard/identification')) {
                    if (0 === strpos($pathinfo, '/admin/application/dashboard/identificationcategory')) {
                        // admin_application_dashboard_identificationcategory_list
                        if ($pathinfo === '/admin/application/dashboard/identificationcategory/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.identificationcategory',  '_sonata_name' => 'admin_application_dashboard_identificationcategory_list',  '_route' => 'admin_application_dashboard_identificationcategory_list',);
                        }

                        // admin_application_dashboard_identificationcategory_create
                        if ($pathinfo === '/admin/application/dashboard/identificationcategory/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.identificationcategory',  '_sonata_name' => 'admin_application_dashboard_identificationcategory_create',  '_route' => 'admin_application_dashboard_identificationcategory_create',);
                        }

                        // admin_application_dashboard_identificationcategory_batch
                        if ($pathinfo === '/admin/application/dashboard/identificationcategory/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.identificationcategory',  '_sonata_name' => 'admin_application_dashboard_identificationcategory_batch',  '_route' => 'admin_application_dashboard_identificationcategory_batch',);
                        }

                        // admin_application_dashboard_identificationcategory_edit
                        if (preg_match('#^/admin/application/dashboard/identificationcategory/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_identificationcategory_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.identificationcategory',  '_sonata_name' => 'admin_application_dashboard_identificationcategory_edit',));
                        }

                        // admin_application_dashboard_identificationcategory_delete
                        if (preg_match('#^/admin/application/dashboard/identificationcategory/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_identificationcategory_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.identificationcategory',  '_sonata_name' => 'admin_application_dashboard_identificationcategory_delete',));
                        }

                        // admin_application_dashboard_identificationcategory_show
                        if (preg_match('#^/admin/application/dashboard/identificationcategory/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_identificationcategory_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.identificationcategory',  '_sonata_name' => 'admin_application_dashboard_identificationcategory_show',));
                        }

                        // admin_application_dashboard_identificationcategory_export
                        if ($pathinfo === '/admin/application/dashboard/identificationcategory/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.identificationcategory',  '_sonata_name' => 'admin_application_dashboard_identificationcategory_export',  '_route' => 'admin_application_dashboard_identificationcategory_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/application/dashboard/identificationtype')) {
                        // admin_application_dashboard_identificationtype_list
                        if ($pathinfo === '/admin/application/dashboard/identificationtype/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.identificationtype',  '_sonata_name' => 'admin_application_dashboard_identificationtype_list',  '_route' => 'admin_application_dashboard_identificationtype_list',);
                        }

                        // admin_application_dashboard_identificationtype_create
                        if ($pathinfo === '/admin/application/dashboard/identificationtype/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.identificationtype',  '_sonata_name' => 'admin_application_dashboard_identificationtype_create',  '_route' => 'admin_application_dashboard_identificationtype_create',);
                        }

                        // admin_application_dashboard_identificationtype_batch
                        if ($pathinfo === '/admin/application/dashboard/identificationtype/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.identificationtype',  '_sonata_name' => 'admin_application_dashboard_identificationtype_batch',  '_route' => 'admin_application_dashboard_identificationtype_batch',);
                        }

                        // admin_application_dashboard_identificationtype_edit
                        if (preg_match('#^/admin/application/dashboard/identificationtype/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_identificationtype_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.identificationtype',  '_sonata_name' => 'admin_application_dashboard_identificationtype_edit',));
                        }

                        // admin_application_dashboard_identificationtype_delete
                        if (preg_match('#^/admin/application/dashboard/identificationtype/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_identificationtype_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.identificationtype',  '_sonata_name' => 'admin_application_dashboard_identificationtype_delete',));
                        }

                        // admin_application_dashboard_identificationtype_show
                        if (preg_match('#^/admin/application/dashboard/identificationtype/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_identificationtype_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.identificationtype',  '_sonata_name' => 'admin_application_dashboard_identificationtype_show',));
                        }

                        // admin_application_dashboard_identificationtype_export
                        if ($pathinfo === '/admin/application/dashboard/identificationtype/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.identificationtype',  '_sonata_name' => 'admin_application_dashboard_identificationtype_export',  '_route' => 'admin_application_dashboard_identificationtype_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/application/dashboard/identificationreason')) {
                        // admin_application_dashboard_identificationreason_list
                        if ($pathinfo === '/admin/application/dashboard/identificationreason/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.identificationreason',  '_sonata_name' => 'admin_application_dashboard_identificationreason_list',  '_route' => 'admin_application_dashboard_identificationreason_list',);
                        }

                        // admin_application_dashboard_identificationreason_create
                        if ($pathinfo === '/admin/application/dashboard/identificationreason/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.identificationreason',  '_sonata_name' => 'admin_application_dashboard_identificationreason_create',  '_route' => 'admin_application_dashboard_identificationreason_create',);
                        }

                        // admin_application_dashboard_identificationreason_batch
                        if ($pathinfo === '/admin/application/dashboard/identificationreason/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.identificationreason',  '_sonata_name' => 'admin_application_dashboard_identificationreason_batch',  '_route' => 'admin_application_dashboard_identificationreason_batch',);
                        }

                        // admin_application_dashboard_identificationreason_edit
                        if (preg_match('#^/admin/application/dashboard/identificationreason/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_identificationreason_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.identificationreason',  '_sonata_name' => 'admin_application_dashboard_identificationreason_edit',));
                        }

                        // admin_application_dashboard_identificationreason_delete
                        if (preg_match('#^/admin/application/dashboard/identificationreason/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_identificationreason_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.identificationreason',  '_sonata_name' => 'admin_application_dashboard_identificationreason_delete',));
                        }

                        // admin_application_dashboard_identificationreason_show
                        if (preg_match('#^/admin/application/dashboard/identificationreason/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_identificationreason_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.identificationreason',  '_sonata_name' => 'admin_application_dashboard_identificationreason_show',));
                        }

                        // admin_application_dashboard_identificationreason_export
                        if ($pathinfo === '/admin/application/dashboard/identificationreason/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.identificationreason',  '_sonata_name' => 'admin_application_dashboard_identificationreason_export',  '_route' => 'admin_application_dashboard_identificationreason_export',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/application/dashboard/c')) {
                    if (0 === strpos($pathinfo, '/admin/application/dashboard/category')) {
                        // admin_application_dashboard_category_list
                        if ($pathinfo === '/admin/application/dashboard/category/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.category',  '_sonata_name' => 'admin_application_dashboard_category_list',  '_route' => 'admin_application_dashboard_category_list',);
                        }

                        // admin_application_dashboard_category_create
                        if ($pathinfo === '/admin/application/dashboard/category/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.category',  '_sonata_name' => 'admin_application_dashboard_category_create',  '_route' => 'admin_application_dashboard_category_create',);
                        }

                        // admin_application_dashboard_category_batch
                        if ($pathinfo === '/admin/application/dashboard/category/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.category',  '_sonata_name' => 'admin_application_dashboard_category_batch',  '_route' => 'admin_application_dashboard_category_batch',);
                        }

                        // admin_application_dashboard_category_edit
                        if (preg_match('#^/admin/application/dashboard/category/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_category_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.category',  '_sonata_name' => 'admin_application_dashboard_category_edit',));
                        }

                        // admin_application_dashboard_category_delete
                        if (preg_match('#^/admin/application/dashboard/category/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_category_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.category',  '_sonata_name' => 'admin_application_dashboard_category_delete',));
                        }

                        // admin_application_dashboard_category_show
                        if (preg_match('#^/admin/application/dashboard/category/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_category_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.category',  '_sonata_name' => 'admin_application_dashboard_category_show',));
                        }

                        // admin_application_dashboard_category_export
                        if ($pathinfo === '/admin/application/dashboard/category/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.category',  '_sonata_name' => 'admin_application_dashboard_category_export',  '_route' => 'admin_application_dashboard_category_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/application/dashboard/connectiontype')) {
                        // admin_application_dashboard_connectiontype_list
                        if ($pathinfo === '/admin/application/dashboard/connectiontype/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.connectiontype',  '_sonata_name' => 'admin_application_dashboard_connectiontype_list',  '_route' => 'admin_application_dashboard_connectiontype_list',);
                        }

                        // admin_application_dashboard_connectiontype_create
                        if ($pathinfo === '/admin/application/dashboard/connectiontype/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.connectiontype',  '_sonata_name' => 'admin_application_dashboard_connectiontype_create',  '_route' => 'admin_application_dashboard_connectiontype_create',);
                        }

                        // admin_application_dashboard_connectiontype_batch
                        if ($pathinfo === '/admin/application/dashboard/connectiontype/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.connectiontype',  '_sonata_name' => 'admin_application_dashboard_connectiontype_batch',  '_route' => 'admin_application_dashboard_connectiontype_batch',);
                        }

                        // admin_application_dashboard_connectiontype_edit
                        if (preg_match('#^/admin/application/dashboard/connectiontype/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_connectiontype_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.connectiontype',  '_sonata_name' => 'admin_application_dashboard_connectiontype_edit',));
                        }

                        // admin_application_dashboard_connectiontype_delete
                        if (preg_match('#^/admin/application/dashboard/connectiontype/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_connectiontype_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.connectiontype',  '_sonata_name' => 'admin_application_dashboard_connectiontype_delete',));
                        }

                        // admin_application_dashboard_connectiontype_show
                        if (preg_match('#^/admin/application/dashboard/connectiontype/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_connectiontype_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.connectiontype',  '_sonata_name' => 'admin_application_dashboard_connectiontype_show',));
                        }

                        // admin_application_dashboard_connectiontype_export
                        if ($pathinfo === '/admin/application/dashboard/connectiontype/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.connectiontype',  '_sonata_name' => 'admin_application_dashboard_connectiontype_export',  '_route' => 'admin_application_dashboard_connectiontype_export',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/application/dashboard/sex')) {
                    // admin_application_dashboard_sex_list
                    if ($pathinfo === '/admin/application/dashboard/sex/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.sex',  '_sonata_name' => 'admin_application_dashboard_sex_list',  '_route' => 'admin_application_dashboard_sex_list',);
                    }

                    // admin_application_dashboard_sex_create
                    if ($pathinfo === '/admin/application/dashboard/sex/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.sex',  '_sonata_name' => 'admin_application_dashboard_sex_create',  '_route' => 'admin_application_dashboard_sex_create',);
                    }

                    // admin_application_dashboard_sex_batch
                    if ($pathinfo === '/admin/application/dashboard/sex/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.sex',  '_sonata_name' => 'admin_application_dashboard_sex_batch',  '_route' => 'admin_application_dashboard_sex_batch',);
                    }

                    // admin_application_dashboard_sex_edit
                    if (preg_match('#^/admin/application/dashboard/sex/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_sex_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.sex',  '_sonata_name' => 'admin_application_dashboard_sex_edit',));
                    }

                    // admin_application_dashboard_sex_delete
                    if (preg_match('#^/admin/application/dashboard/sex/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_sex_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.sex',  '_sonata_name' => 'admin_application_dashboard_sex_delete',));
                    }

                    // admin_application_dashboard_sex_show
                    if (preg_match('#^/admin/application/dashboard/sex/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_sex_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.sex',  '_sonata_name' => 'admin_application_dashboard_sex_show',));
                    }

                    // admin_application_dashboard_sex_export
                    if ($pathinfo === '/admin/application/dashboard/sex/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.sex',  '_sonata_name' => 'admin_application_dashboard_sex_export',  '_route' => 'admin_application_dashboard_sex_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/application/dashboard/height')) {
                    // admin_application_dashboard_height_list
                    if ($pathinfo === '/admin/application/dashboard/height/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.height',  '_sonata_name' => 'admin_application_dashboard_height_list',  '_route' => 'admin_application_dashboard_height_list',);
                    }

                    // admin_application_dashboard_height_create
                    if ($pathinfo === '/admin/application/dashboard/height/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.height',  '_sonata_name' => 'admin_application_dashboard_height_create',  '_route' => 'admin_application_dashboard_height_create',);
                    }

                    // admin_application_dashboard_height_batch
                    if ($pathinfo === '/admin/application/dashboard/height/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.height',  '_sonata_name' => 'admin_application_dashboard_height_batch',  '_route' => 'admin_application_dashboard_height_batch',);
                    }

                    // admin_application_dashboard_height_edit
                    if (preg_match('#^/admin/application/dashboard/height/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_height_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.height',  '_sonata_name' => 'admin_application_dashboard_height_edit',));
                    }

                    // admin_application_dashboard_height_delete
                    if (preg_match('#^/admin/application/dashboard/height/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_height_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.height',  '_sonata_name' => 'admin_application_dashboard_height_delete',));
                    }

                    // admin_application_dashboard_height_show
                    if (preg_match('#^/admin/application/dashboard/height/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_height_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.height',  '_sonata_name' => 'admin_application_dashboard_height_show',));
                    }

                    // admin_application_dashboard_height_export
                    if ($pathinfo === '/admin/application/dashboard/height/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.height',  '_sonata_name' => 'admin_application_dashboard_height_export',  '_route' => 'admin_application_dashboard_height_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/application/dashboard/similarto')) {
                    // admin_application_dashboard_similarto_list
                    if ($pathinfo === '/admin/application/dashboard/similarto/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.similarto',  '_sonata_name' => 'admin_application_dashboard_similarto_list',  '_route' => 'admin_application_dashboard_similarto_list',);
                    }

                    // admin_application_dashboard_similarto_create
                    if ($pathinfo === '/admin/application/dashboard/similarto/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.similarto',  '_sonata_name' => 'admin_application_dashboard_similarto_create',  '_route' => 'admin_application_dashboard_similarto_create',);
                    }

                    // admin_application_dashboard_similarto_batch
                    if ($pathinfo === '/admin/application/dashboard/similarto/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.similarto',  '_sonata_name' => 'admin_application_dashboard_similarto_batch',  '_route' => 'admin_application_dashboard_similarto_batch',);
                    }

                    // admin_application_dashboard_similarto_edit
                    if (preg_match('#^/admin/application/dashboard/similarto/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_similarto_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.similarto',  '_sonata_name' => 'admin_application_dashboard_similarto_edit',));
                    }

                    // admin_application_dashboard_similarto_delete
                    if (preg_match('#^/admin/application/dashboard/similarto/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_similarto_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.similarto',  '_sonata_name' => 'admin_application_dashboard_similarto_delete',));
                    }

                    // admin_application_dashboard_similarto_show
                    if (preg_match('#^/admin/application/dashboard/similarto/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_similarto_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.similarto',  '_sonata_name' => 'admin_application_dashboard_similarto_show',));
                    }

                    // admin_application_dashboard_similarto_export
                    if ($pathinfo === '/admin/application/dashboard/similarto/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.similarto',  '_sonata_name' => 'admin_application_dashboard_similarto_export',  '_route' => 'admin_application_dashboard_similarto_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/application/dashboard/physique')) {
                    // admin_application_dashboard_physique_list
                    if ($pathinfo === '/admin/application/dashboard/physique/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.physique',  '_sonata_name' => 'admin_application_dashboard_physique_list',  '_route' => 'admin_application_dashboard_physique_list',);
                    }

                    // admin_application_dashboard_physique_create
                    if ($pathinfo === '/admin/application/dashboard/physique/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.physique',  '_sonata_name' => 'admin_application_dashboard_physique_create',  '_route' => 'admin_application_dashboard_physique_create',);
                    }

                    // admin_application_dashboard_physique_batch
                    if ($pathinfo === '/admin/application/dashboard/physique/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.physique',  '_sonata_name' => 'admin_application_dashboard_physique_batch',  '_route' => 'admin_application_dashboard_physique_batch',);
                    }

                    // admin_application_dashboard_physique_edit
                    if (preg_match('#^/admin/application/dashboard/physique/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_physique_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.physique',  '_sonata_name' => 'admin_application_dashboard_physique_edit',));
                    }

                    // admin_application_dashboard_physique_delete
                    if (preg_match('#^/admin/application/dashboard/physique/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_physique_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.physique',  '_sonata_name' => 'admin_application_dashboard_physique_delete',));
                    }

                    // admin_application_dashboard_physique_show
                    if (preg_match('#^/admin/application/dashboard/physique/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_physique_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.physique',  '_sonata_name' => 'admin_application_dashboard_physique_show',));
                    }

                    // admin_application_dashboard_physique_export
                    if ($pathinfo === '/admin/application/dashboard/physique/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.physique',  '_sonata_name' => 'admin_application_dashboard_physique_export',  '_route' => 'admin_application_dashboard_physique_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/application/dashboard/nationality')) {
                    // admin_application_dashboard_nationality_list
                    if ($pathinfo === '/admin/application/dashboard/nationality/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.nationality',  '_sonata_name' => 'admin_application_dashboard_nationality_list',  '_route' => 'admin_application_dashboard_nationality_list',);
                    }

                    // admin_application_dashboard_nationality_create
                    if ($pathinfo === '/admin/application/dashboard/nationality/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.nationality',  '_sonata_name' => 'admin_application_dashboard_nationality_create',  '_route' => 'admin_application_dashboard_nationality_create',);
                    }

                    // admin_application_dashboard_nationality_batch
                    if ($pathinfo === '/admin/application/dashboard/nationality/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.nationality',  '_sonata_name' => 'admin_application_dashboard_nationality_batch',  '_route' => 'admin_application_dashboard_nationality_batch',);
                    }

                    // admin_application_dashboard_nationality_edit
                    if (preg_match('#^/admin/application/dashboard/nationality/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_nationality_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.nationality',  '_sonata_name' => 'admin_application_dashboard_nationality_edit',));
                    }

                    // admin_application_dashboard_nationality_delete
                    if (preg_match('#^/admin/application/dashboard/nationality/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_nationality_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.nationality',  '_sonata_name' => 'admin_application_dashboard_nationality_delete',));
                    }

                    // admin_application_dashboard_nationality_show
                    if (preg_match('#^/admin/application/dashboard/nationality/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_application_dashboard_nationality_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.nationality',  '_sonata_name' => 'admin_application_dashboard_nationality_show',));
                    }

                    // admin_application_dashboard_nationality_export
                    if ($pathinfo === '/admin/application/dashboard/nationality/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.nationality',  '_sonata_name' => 'admin_application_dashboard_nationality_export',  '_route' => 'admin_application_dashboard_nationality_export',);
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            // login_check
            if ($pathinfo === '/login_check') {
                return array('_route' => 'login_check');
            }

            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
