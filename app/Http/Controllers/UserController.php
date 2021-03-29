<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use  App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth; 
use Tymon\JWTAuth\Exceptions\JWTExceptions; 

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return UserResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User(); 
        $users->name = $request->name;
        $users->surname = $request->surname;
        $users->password = $request->password;
        $users->email = $request->email;
        if($users->save())
        {
            return new UserResource($users);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::findOrFail($id);
        return new UserResource($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->name = $request->name;
        $users->surname = $request->surname;
        $users->password = $request->password;
        $users->email = $request->email;
        
        if($users->save())
        {
            return new UserResource($users);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        if($users->delete())
        {
            return new UserResource($users);
        }

    }



    public function register (Request $request){
        //methode pour vérifier que l'email n'est pas dupliqué (avec l'aide de la signification unique dans la migration)
        $user = User::where('email', $request['email'])->first();

        if($user){
            $response['status'] = 0; // il y'a un erreur
            $response['message'] = 'Email already exists';
            $response['code'] = 409; // 409 c'est la signification que quelque chose déja exist
        }
        else{
            //user::create c'est une méthode qui permet de définir les champs de table (bcrypt a besoin de facades/hash)
            $user = User::create([
                'name'  =>$request->name,

                'surname'  =>$request->surname,

                'email' =>$request->email,
                'password' =>bcrypt($request->password)
            ]);
            $response['status'] = 1; //status est 1 c'est un indicateur que ca marche bien (pas de probléme) (c'est pour le test et la vérif)
            $response['message'] = 'user registered successfully'; 
            $response['code'] = 200; //200 c'est a dire que tous va bien et il n'y pas d'erreur
        }
       
        return response()->json($response); // test de la methode create donc on utilise la form JSON (c'est un choix) pour le test avec postman
    }

//try et catch de la fn login a besoin de (use Tymon\JWTAuth\Facades\JWTAuth; use Tymon\JWTAuth\Exceptions\JWTExceptions;) pour detecter s'il ya d'erreur
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        try { //il y a un test que c'est vrai ou non 
            if(!JWTAuth::attempt($credentials)){
            $response['status'] = 0;
            $response['code'] = 401;
            $response['data'] = null;
            $response['message'] = 'email or password is incorrect';
            return response()->json($response);


            }

        } catch(JWTException $e){
            $response['data'] = null;
            $response['code'] = 500;
            $response['message'] = 'could not create token';
            return response()->json($response);

        }
//generer le token (token va utiliser l'email et le mdp c tt (mettre l'email et le mdp dans le postman)) avec la verif que
//ce email et password correct et exist dans bd ou nn
        $user = auth()->user();
        $data['token'] = auth()->claims([
            'user_id' => $user->id,
            'email' => $user->email
        ])->attempt($credentials); //attempt fait le try et attend si la response vrai ou non
//utiliser le token pour le login tt simplement
            $response['data'] = $data; //c'est le token
            $response['status'] = 1;
            $response['code'] = 200;
            $response['message'] = 'login successfully';
            return response()->json($response);

    }


    

}
