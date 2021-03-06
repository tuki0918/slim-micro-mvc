<?php

// CLI-compatible not found error handler
$app->notFound(function () use ($app) {
    $url = $app->environment['PATH_INFO'];
    echo "Error: Cannot route to {$url}";
    $app->stop();
});

// Format errors for CLI
$app->error(function (\Exception $e) use ($app) {
    $msg = $e->getMessage();
    $app->log->addWarning($msg);
    echo $msg;
    $app->stop();
});