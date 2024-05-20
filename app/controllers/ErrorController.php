<?php
class ErrorController extends Controller {
    public function show404() {
        $this->view('error/error404');
    }
}