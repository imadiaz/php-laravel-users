<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{


    public function __invoke() {

        //Aqui obtenemos la lista de la bd y la mandamos a la vista a ver si tenemos datos para pinatar la tabla
        $users = $this->getUsers();
        return view('users.users',compact('users'));    }

    public function store(Request $request) {

        //Aqui el id deberia ser automatico autogenerado desde mysql
        $this->registerUser(new UserInfo(random_int(1, 999999),$request->name, $request->lastname, $request->age, $request->email));
        $users = $this->getUsers();
        return redirect()->back()->with($users);

    }

    //Esto es logica asi que deberiamos moverlo a otro archivo
    private function getUsers() {
        //seleccionamos todos los datos de la tabla users
        return DB::select('select * from users');
    }


    //Esto tambien es logica
    private function registerUser(
        UserInfo $user
    ) {
        //hacemos el isnert aqui deberia existir un procedimiento almacenado y no dejar la informacion asi
        DB::insert('insert into users (id, name, lastname, age, email) values (?, ?, ?, ?, ?)', array($user->id, $user->name, $user->lastname, $user->age, $user->email));
    }
    
}



//Esta es la clase modelo debes moverla a la carpeta para separar bien el codigo
class UserInfo
{
    public $id;
    public $name;
    public $lastname;
    public $age;
    public $email;
    public function __construct($id,$name, $lastname, $age, $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->email = $email;
    }
}
