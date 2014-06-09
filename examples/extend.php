<?php

chdir(realpath(dirname(__FILE__) . '/..'));
spl_autoload_register();

class MyThread extends PcntlThreading\PcntlThread {

    public function run() {
        for ($i = 0; $i < 5; $i++) {
            echo 'Variable $i from thread: ' . $i . PHP_EOL;
            sleep(1);
        }
    }

}

$i = 125;

try {
    $thread = new MyThread();
    $thread->start();

    echo 'Variable $i in maing thread is: ' . $i;
    echo 'Thread started. (PID: ' . $thread->getProcessId() . ')' . PHP_EOL;
    echo 'Waiting for ';

    $thread->join();

    echo 'Thread ended. Variable $i from maing thread is stil: ' . $i;
} catch (PcntlThreading\PcntlThreadStartException $e) {
    echo $e->getTraceAsString();
}
