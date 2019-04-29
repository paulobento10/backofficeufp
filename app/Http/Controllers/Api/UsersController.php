<?php

namespace App\Http\Controllers\Api;

use App\API\QueryBuilder;
use App\API\ApiError;
use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    /**
     * @var Users
     */
    private $users;

    public function __construct(Users $news)
    {
        $this->users = $news;
    }

    public function index()
    {
        $data = ['data' => $this->users->all()];

        return response()->json($data);
    }

    public function index_N()
    {
        $data = ['data' => $this->users->paginate(5)];

        return response()->json($data);
    }

    public function show_id(Users $id)
    {
        $data = ['data' => $id];

        return response()->json($data);
    }

    public function search_query(Request $request)
    {
        try {

            if ($request->has('nome')) {
                $users = Users::where('nome', 'LIKE', "%{$request->nome}%");
            }

            if ($request->has('curso')) {
                $users = Users::where('curso', 'LIKE', "%{$request->curso}%");
            }

            if ($request->has('plano')) {
                $users = Users::where('plano', 'LIKE', "%{$request->plano}%");
            }

            $data = ['data' => $users->get()];

            return response()->json($data);

        } catch (\Excetion $e) {
            if(config('app.debug')) {
                return response()->json(ApiError::errorMessage('Houve um Error ao Pesquisar Utilizadores', 1010));
            }
        }
    }

    public function store(Request $request)
    {
        try {
            $eventsData = $request->all();
            $this->users->create($eventsData);

            $return = ['data' => ['msg' => 'Utilizador Criada com Sucesso!']];
            return responce()->json($return, 201);

        } catch (\Excetion $e) {
            if(config('app.debug')) {
                //return response()->json(ApiError::errorMessage($e->getMessage()), 1010);
                return response()->json(ApiError::errorMessage('Houve um Error ao Criar Utilizador', 1011));
            }
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $eventsData = $request->all();
            $event = $this->users->find($id);
            $event->update($eventsData);

            $return = ['data' => ['msg' => 'Utilizador Actualizado com Sucesso!']];
            return responce()->json($return, 201);

        } catch (\Excetion $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage('Houve um Error ao Actualizar Utilizador', 1012));
            }
        }
    }

    public function delete(Users $id)
    {
        try {
            $id->delete();

            $return = ['data' => ['msg' => 'Utilizador Apagado com Sucesso!']];
            return responce()->json($return, 200);

        } catch (\Excetion $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage('Houve um Error ao Apagado Utilizador', 1013));
            }
        }
    }
}
