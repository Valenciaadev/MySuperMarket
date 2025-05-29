<?php

    namespace app\controllers\auth;

    use app\controllers\Controller as Controller;
    use app\classes\View as View;
    use app\models\user as user;

    class SessionController extends Controller {
        public function __construct(){
            parent::__construct();
        }
    
        public function iniSession($params = null){
            $response = [
                'ua'    => ['sv' => 0],
                'title' => "Iniciar sesión",
                'code'  => 200
            ];
            View::render('panel',$response);
        }

        public function userAuth(){
            $datos = filter_input_array(INPUT_POST , FILTER_SANITIZE_SPECIAL_CHARS);

            $user = new user();

            $result = $user -> where([["email",$datos['email']],["passwd",sha1($datos['passwd'])]]) -> get();

            if( count( json_decode($result) ) > 0 ){
                //Se registra la sesión
                echo $this -> sessionRegister( $result );
            }else{
                self::sessionDestroy();
                echo json_encode( ["r" => false]);
            }
        }

        private function sessionRegister( $r ){
            $datos = json_decode( $r );
            session_start();
            $_SESSION['sv']       = true;
            $_SESSION['IP']       = $_SERVER['REMOTE_ADDR'];
            $_SESSION['id']       = $datos[0]->id;
            $_SESSION['email'] = $datos[0]->email;
            $_SESSION['passwd']   = $datos[0]->passwd;
            $_SESSION['tipo']     = $datos[0]->tipo;
            session_write_close();
            return json_encode( ["r" => true]);

        }

        public static function sessionValidate(){
            $user = new user();
            session_start();
            
            if(isset($_SESSION['sv']) && $_SESSION['sv'] == true){
                $datos = $_SESSION;
               
                 $result = $user -> where([["email",$datos['email']],
                                          ["passwd",$datos['passwd']]]) -> get(); 
               
                if( count(json_decode($result)) > 0 && $datos['IP'] == $_SERVER['REMOTE_ADDR']){
                    session_write_close();
                    return ['username'=>$datos['username'],
                            'sv'=>$datos['sv'],
                            'id'=>$datos['id'],
                            'tipo'=>$datos['tipo']];
                }else{
                    session_write_close();
                    self::sessionDestroy();
                    return null;
                }
            }
            session_write_close();
            self::sessionDestroy();
            return null;
        }

        private static function sessionDestroy(){
            session_start();
            $_SESSION = ['sv' => false];
            session_destroy();
            session_write_close();
        }

        public function logout(){
            $this->sessionDestroy();
            //Redirect::to('/');
            exit();
        }
    }