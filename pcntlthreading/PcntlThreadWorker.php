<?php
namespace PcntlThreading;

/**
 * PcntlThreadWorker Class.
 *
 * @author Jacek Górka <jacek.gorka2@gmail.com>
 */
abstract class PcntlThreadWorker {
            
    abstract protected function run();
    
    final public function invoke() {
        $this->run();
    }
}