<?php
class HomeController extends Controller {
    public function index() {
        $data['judul'] = 'Home Page';
        $this->view('home/index', $data);
    }
}