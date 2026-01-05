<?php
/**
 * GadgetHub - Front Controller
 * Handles environment detection, session management, and application bootstrapping
 */

// ============================================
// ENVIRONMENT DETECTION
// ============================================
$isProduction = false;
$hostname = $_SERVER['HTTP_HOST'] ?? '';

// Detect production environment by hostname
if (strpos($hostname, 'gadgethub.07tple001.fun') !== false || 
    strpos($hostname, '.fun') !== false ||
    strpos($hostname, 'cloudflare') !== false) {
    $isProduction = true;
}

// ============================================
// LOAD CONFIGURATION
// ============================================
if ($isProduction) {
    // Production: Load production config
    if (file_exists('../app/config/config.production.php')) {
        require_once '../app/config/config.production.php';
    } else {
        die('ERROR: config.production.php not found. Please create production configuration file.');
    }
} else {
    // Development: Load development config
    require_once '../app/config/config.php';
}

// ============================================
// SESSION CONFIGURATION
// ============================================
if (!session_id()) {
    // Get default session save path
    $sessionPath = session_save_path();
    
    // Check if default path is writable
    if (empty($sessionPath) || !is_writable($sessionPath)) {
        // Use custom session directory in app folder
        $customSessionPath = dirname(__DIR__) . '/app/sessions';
        
        // Create directory if not exists
        if (!file_exists($customSessionPath)) {
            @mkdir($customSessionPath, 0755, true);
        }
        
        // Set custom session path if writable
        if (is_writable($customSessionPath)) {
            session_save_path($customSessionPath);
        }
    }
    
    // Configure session parameters
    ini_set('session.gc_maxlifetime', 3600); // 1 hour
    ini_set('session.cookie_lifetime', 0); // Until browser closes
    
    // Start session with error handling
    try {
        session_start();
    } catch (Exception $e) {
        // Log error but continue (session might still work)
        error_log('Session start failed: ' . $e->getMessage());
    }
}

// ============================================
// LOAD CORE FILES
// ============================================
require_once '../app/core/App.php';
require_once '../app/core/Controller.php';
require_once '../app/core/Model.php';
require_once '../app/core/Flasher.php';

// ============================================
// BOOTSTRAP APPLICATION
// ============================================
$app = new App;
