<?php
use CodeIgniter\Router\RouteCollection;
/** @var RouteCollection $routes */
$routes->setAutoRoute(false);
$contracts = require __DIR__ . '/ApiContracts.php';
// Laravel replaces duplicate verb/URI declarations with the last one.
// CI keeps the first, so resolve duplicates explicitly before registration.
$effective = [];
foreach ($contracts as $id => $contract) {
    foreach ($contract['methods'] as $verb) $effective[$verb . ' ' . $contract['path']] = [$id, $verb];
}
foreach ($effective as [$id, $verb]) {
    $contract = $contracts[$id];
    $count = 0;
    $pattern = preg_replace_callback('/\{([^}]+)\}/', function ($match) use ($contract, &$count) {
        ++$count;
        return '(' . ($contract['wheres'][$match[1]] ?? '[^/]+') . ')';
    }, $contract['path']);
    $target = 'ApiGateway::handle/' . $id;
    for ($i = 1; $i <= $count; $i++) $target .= '/$' . $i;
    $routes->match($verb === 'GET' ? ['GET', 'HEAD'] : [$verb], $pattern, $target, ['filter' => 'apiAccess:' . $id]);
}
$routes->options('api/(:any)', 'ApiGateway::options');
$routes->match(['GET', 'HEAD', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'], 'api/(:any)', 'ApiGateway::notFound');
$routes->match(['GET', 'HEAD', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'], 'api', 'ApiGateway::notFound');
$routes->match(['GET', 'HEAD'], 'health', 'Home::health');
$routes->match(['GET', 'HEAD'], '/', 'Home::index');
$routes->match(['GET', 'HEAD'], '(:any)', 'Home::index');
