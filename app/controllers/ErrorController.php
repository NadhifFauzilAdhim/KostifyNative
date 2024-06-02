<?php
class ErrorController extends Controller {
    public function show404() {
        $this->view('error/error404');
    }
    public function show403() {
        $this->view('error/error403');
    }
}