<?php
trait FileLogger {
    public function log($msg) {
        echo date('Y-m-d h:i:s') . ':' . $msg . '\n';
    }
}

trait DatabaseLogger {
    public function log($msg) {
        echo $msg . '\n';
    }
}

class Logger {
    use FileLogger, DatabaseLogger
    {
        DatabaseLogger::log as log_to_database;
        FileLogger::log as log_to_file;
    }
}

$log = new Logger();
echo $log->log_to_file();
