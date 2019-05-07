<?php

namespace App\Http\Controllers\Api;

use App\API\QueryBuilder;
use App\API\ApiError;
use App\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    /**
     * @var event
     */
    private $events;

    public function __construct(Events $events)
    {
        $this->events = $events;
    }

    public function index()
    {
        $data = ['data' => $this->events->all()];

        return response()->json($data);
    }

    public function index_N()
    {
        $data = ['data' => $this->events->paginate(5)];

        return response()->json($data);
    }

    public function show_id(Events $id)
    {
        $data = ['data' => $id];

        return response()->json($data);
    }

    public function search_query(Request $request)
    {
        try {

            if ($request->has('nome')) {
                $events = Events::where('nome_pt', 'LIKE', "%{$request->nome}%")
                    ->orwhere('nome_en', 'LIKE', "%{$request->nome}%")
                    ->orwhere('nome_outro', 'LIKE', "%{$request->nome}%");
            }
            if ($request->has('descricao')) {
                $events = Events::where('descricao_pt', 'LIKE', "%{$request->descricao}%")
                    ->orwhere('descricao_en', 'LIKE', "%{$request->descricao}%")
                    ->orwhere('descricao_outro', 'LIKE', "%{$request->descricao}%");
            }

            if ($request->has('curso')) {
                $events = Events::where('curso_pt', 'LIKE', "%{$request->curso}%")
                    ->orwhere('curso_en', 'LIKE', "%{$request->curso}%")
                    ->orwhere('curso_outro', 'LIKE', "%{$request->curso}%");
            }

            if ($request->has('categoria')) {
                $events = Events::where('categoria_pt', 'LIKE', "%{$request->categoria}%")
                    ->orwhere('categoria_en', 'LIKE', "%{$request->categoria}%")
                    ->orwhere('categoria_outro', 'LIKE', "%{$request->categoria}%");
            }

            if ($request->has('faculdade')) {
                $events = Events::where('faculdade_pt', 'LIKE', "%{$request->faculdade}%")
                    ->orwhere('faculdade_en', 'LIKE', "%{$request->faculdade}%")
                    ->orwhere('faculdade_outro', 'LIKE', "%{$request->faculdade}%");
            }

            if ($request->has('data')) {
                $events = Events::where('data', 'LIKE', "%{$request->data}%");
            }

            $data = ['data' => $events->get()];

            return response()->json($data);

        } catch (\Excetion $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage('Houve um Error ao Pesquisar Evento', 1010));
            }
        }
    }

    public function store(Request $request)
    {
        try {
            $eventsData = $request->all();
            $this->events->create($eventsData);

            $return = ['data' => ['msg' => 'Evento Criada com Sucesso!']];
            return responce()->json($return, 201);

        } catch (\Excetion $e) {
            if (config('app.debug')) {
                //return response()->json(ApiError::errorMessage($e->getMessage()), 1010);
                return response()->json(ApiError::errorMessage('Houve um Error ao Criar Evento', 1011));
            }
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $eventsData = $request->all();
            $event = $this->events->find($id);
            $event->update($eventsData);

            $return = ['data' => ['msg' => 'Evento Actualizado com Sucesso!']];
            return responce()->json($return, 201);

        } catch (\Excetion $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage('Houve um Error ao Actualizar Evento', 1012));
            }
        }
    }

    public function delete(Events $id)
    {
        try {
            $id->delete();

            $return = ['data' => ['msg' => 'Evento Apagado com Sucesso!']];
            return responce()->json($return, 200);

        } catch (\Excetion $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage('Houve um Error ao Apagado Evento', 1013));
            }
        }
    }
}
