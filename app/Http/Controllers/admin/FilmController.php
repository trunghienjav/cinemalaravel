<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Film;
use App\Models\Status;
use App\Models\Subtitle;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    private object $model;
    private string $table;

    public function __construct()
    {
        $this->model = Film::query();
        $this->table = (new Film())->getTable();

        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index(Request $request): JsonResponse
    {
        $search = $request->get('q');
        $filter = $request->get('status');

        $films = $this->model
            ->join('statuses', 'films.status_id', '=', 'statuses.id')
            ->select('films.*', 'statuses.name as status')
            ->where('films.name', 'like', '%' . $search . '%')
            ->where('statuses.id', 'like', '%' . $filter . '%')
            // ->get();
            ->latest()
            ->paginate(2);
        $films->appends(['q' => $search]); //them vao de search theo pagination

        return response()->json($films);
    }

    public function create()
    {
        $films_subtitle = Subtitle::query()
            ->select('id as value', 'name as label')
            ->get();

        $films_status = Status::query()
            ->select('id as value', 'name as label')
            ->get();

        return response()->json([
            "films_subtitle" => $films_subtitle,
            "films_status" => $films_status
        ]);
    }

    public function store(StoreRequest $request)
    {
        // return $request;
        $films = $request->validated();
        Film::create($films);
    }
    public function edit($id)
    {
        $films = $this->model->find($id);
        $films_subtitle = Subtitle::query()
            ->select('id as value', 'name as label')
            ->get();

        $films_status = Status::query()
            ->select('id as value', 'name as label')
            ->get();

        return response()->json([
            'films' => $films,
            'films_status' => $films_status,
            'films_subtitle' => $films_subtitle
        ]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $object = $this->model->find($id);
        $object->fill($request->validated());
        $object->save();
    }
    public function destroy($id)
    {
        // $this->model->destroy($id);
        $films = $this->model->find($id);
        if (!$films) {
            return response()->json([
                'status' => 400,
                'msg' => 'Không tìm thấy user này'
            ], 400);
        }
        $films->destroy($id);
        return response()->json([
            'status' => 200,
            'msg' => 'Xoá thành công'
        ], 200);
    }
}
