<?php
namespace app\controllers;
use app\classes\View as View;

class PanelControlController extends Controller {
    public function panelView($params = null){
        View::render('panelView');
    }
}