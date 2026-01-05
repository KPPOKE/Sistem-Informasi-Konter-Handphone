<?php

$isProduction = false;
$hostname = $_SERVER['HTTP_HOST'] ?? '';

if (strpos($hostname, 'gadgethub.07tple001.fun') !== false || 
    strpos($hostname, '.fun') !== false ||
    strpos($hostname, 'cloudflare') !== false) {
    $isProduction = true;
}

if ($isProduction) {
    if (file_exists('../app/config/config.production.php')) {
        require_once '../app/config/config.production.php';
    } else {
        die('ERROR: config.production.php not found. Please create production configuration file.');
    }
} else {
    require_once '../app/config/config.php';
}

if (!session_id()) {
    $sessionPath = session_save_path();
    
    if (empty($sessionPath) || !is_writable($sessionPath)) {
        $customSessionPath = dirname(__DIR__) . '/app/sessions';
        
        if (!file_exists($customSessionPath)) {
            @mkdir($customSessionPath, 0755, true);
        }
        
        if (is_writable($customSessionPath)) {
            session_save_path($customSessionPath);
        }
    }
    
    ini_set('session.gc_maxlifetime', 3600);
    ini_set('session.cookie_lifetime', 0);
    
    try {
        session_start();
    } catch (Exception $e) {
        error_log('Session start failed: ' . $e->getMessage());
    }
}

require_once '../app/core/App.php';
require_once '../app/core/Controller.php';
require_once '../app/core/Model.php';
require_once '../app/core/Flasher.php';

$app = new App;
