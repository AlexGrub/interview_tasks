<?php 

interface WorkerInterface {
    public function work();
    public function eat();
}

class Worker implements WorkerInterface {

    public function work() {

    }

    public function eat() {

    }
}

class SuperWorker implements WorkerInterface {

    public function work() {

    }

    public function eat() {

    }
}

class Manager {
    
    /** @var WorkerInterface $worker **/
    private $worker;

    public function setWorker(WorkerInterface $worker) {
        $this->worker = $worker;
    }

    public function manage() {
        $this->worker->work();
    }
}