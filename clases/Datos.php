<?php
    namespace Clases;
    require '../vendor/autoload.php';
    use Faker\Factory;
    use Clases\Users;
    Class Datos{ 
        public function __construct($tabla, $cantidad){
            $this->faker=Factory::create('es_ES');
            switch($tabla){
                case "users":
                    $this->crearUsuarios($cantidad);
                    break;
                case "tags":
                    $this->crearTags($cantidad);
                    break;
            }
        }
        public function crearUsuarios($n){
            $usuario=new Users();
            $usuario->borrarTodo();
            $usuario->setNombre("Manuel");
            $usuario->setApellidos("Perez Lopez");
            $usuario->setUsername("admin");
            $usuario->setMail("admin@gmail.com");
            $pass=hash("sha256", "secret0");
            $usuario->setPass("$pass");
            $usuario->create();     
            for($i=0;$i<=$n;$i++){
                $usuario->setNombre($this->faker->firstName());
                $usuario->setApellidos($this->faker->lastName()." ".$this->faker->lastName());
                $usuario->setUsername($this->faker->unique()->userName);
                $usuario->setMail($this->faker->unique()->email());
                $usuario->setPass($this->faker->sha256);
                $usuario->create();
            }
            $usuario=null;
        }
        public function crearTags($n){
        }
    }