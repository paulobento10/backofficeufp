<?php

namespace App\Http\Controllers\Api;

use App\API\QueryBuilder;
use App\API\ApiError;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{

    /**
     * @var News
     */
    private $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function index()
    {
        $data = ['data' => $this->news->all()];

        return response()->json($data);
    }

    public function index_N()
    {
        $data = ['data' => $this->news->paginate(5)];

        return response()->json($data);
    }

    public function show_id(News $id)
    {
        $data = ['data' => $id];

        return response()->json($data);
    }

    public function search_query(Request $request)
    {
        try {

            if ($request->has('nome')) {
                $news = News::where('nome_pt', 'LIKE', "%{$request->nome}%")
                    ->orwhere('nome_en', 'LIKE', "%{$request->nome}%")
                    ->orwhere('nome_outro', 'LIKE', "%{$request->nome}%");
            }
            if ($request->has('descricao')) {
                $news = News::where('descricao_pt', 'LIKE', "%{$request->descricao}%")
                    ->orwhere('descricao_en', 'LIKE', "%{$request->descricao}%")
                    ->orwhere('descricao_outro', 'LIKE', "%{$request->descricao}%");
            }

            if ($request->has('curso')) {
                $news = News::where('curso_pt', 'LIKE', "%{$request->curso}%")
                    ->orwhere('curso_en', 'LIKE', "%{$request->curso}%")
                    ->orwhere('curso_outro', 'LIKE', "%{$request->curso}%");
            }

            if ($request->has('categoria')) {
                $news = News::where('categoria_pt', 'LIKE', "%{$request->categoria}%")
                    ->orwhere('categoria_en', 'LIKE', "%{$request->categoria}%")
                    ->orwhere('categoria_outro', 'LIKE', "%{$request->categoria}%");
            }

            if ($request->has('faculdade')) {
                $news = News::where('faculdade_pt', 'LIKE', "%{$request->faculdade}%")
                    ->orwhere('faculdade_en', 'LIKE', "%{$request->faculdade}%")
                    ->orwhere('faculdade_outro', 'LIKE', "%{$request->faculdade}%");
            }

            if ($request->has('data')) {
                $news = News::where('data', 'LIKE', "%{$request->data}%");
            }

            $data = ['data' => $news->get()];

            return response()->json($data);

        } catch (\Excetion $e) {
            if(config('app.debug')) {
                return response()->json(ApiError::errorMessage('Houve um Error ao Pesquisar Noticia', 1010));
            }
        }
    }

    public function store(Request $request)
    {
        try {
            $eventsData = $request->all();
            $this->news->create($eventsData);

            $return = ['data' => ['msg' => 'Noticia Criada com Sucesso!']];
            return responce()->json($return, 201);

        } catch (\Excetion $e) {
            if(config('app.debug')) {
                //return response()->json(ApiError::errorMessage($e->getMessage()), 1010);
                return response()->json(ApiError::errorMessage('Houve um Error ao Criar Noticia', 1011));
            }
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $eventsData = $request->all();
            $event = $this->news->find($id);
            $event->update($eventsData);

            $return = ['data' => ['msg' => 'Noticia Actualizado com Sucesso!']];
            return responce()->json($return, 201);

        } catch (\Excetion $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage('Houve um Error ao Actualizar Noticia', 1012));
            }
        }
    }

    public function delete(News $id)
    {
        try {
            $id->delete();

            $return = ['data' => ['msg' => 'Noticia Apagado com Sucesso!']];
            return responce()->json($return, 200);

        } catch (\Excetion $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage('Houve um Error ao Apagado Noticia', 1013));
            }
        }
    }
}
