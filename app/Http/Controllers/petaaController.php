<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepetaaRequest;
use App\Http\Requests\UpdatepetaaRequest;
use App\Repositories\petaaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class petaaController extends AppBaseController
{
    /** @var petaaRepository $petaaRepository*/
    private $petaaRepository;

    public function __construct(petaaRepository $petaaRepo)
    {
        $this->petaaRepository = $petaaRepo;
    }

    /**
     * Display a listing of the petaa.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $petaas = $this->petaaRepository->all();

        return view('petaas.index')
            ->with('petaas', $petaas);
    }

    /**
     * Show the form for creating a new petaa.
     *
     * @return Response
     */
    public function create()
    {
        return view('petaas.create');
    }

    /**
     * Store a newly created petaa in storage.
     *
     * @param CreatepetaaRequest $request
     *
     * @return Response
     */
    // public function store(CreatepetaaRequest $request)
    // {
    //     $input = $request->all();

    //     $petaa = $this->petaaRepository->create($input);

    //     Flash::success('Petaa saved successfully.');

    //     return redirect(route('petaas.index'));
    // }

    public function store(CreatepetaaRequest $request)
{
    $input = $request->all();

    // Jika ada file geojson
    if ($request->hasFile('geojson')) {

        $file = $request->file('geojson');
        $filename = time() . '_' . $file->getClientOriginalName();

        $file->move(public_path('geojson'), $filename);

        $input['geojson'] = 'geojson/' . $filename;
    }

    $petaa = $this->petaaRepository->create($input);

    Flash::success('Petaa saved successfully.');

    return redirect(route('petaas.index'));
}

    /**
     * Display the specified petaa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $petaa = $this->petaaRepository->find($id);

        if (empty($petaa)) {
            Flash::error('Petaa not found');

            return redirect(route('petaas.index'));
        }

        return view('petaas.show')->with('petaa', $petaa);
    }

    /**
     * Show the form for editing the specified petaa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $petaa = $this->petaaRepository->find($id);

        if (empty($petaa)) {
            Flash::error('Petaa not found');

            return redirect(route('petaas.index'));
        }

        return view('petaas.edit')->with('petaa', $petaa);
    }

    /**
     * Update the specified petaa in storage.
     *
     * @param int $id
     * @param UpdatepetaaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepetaaRequest $request)
    {
        $petaa = $this->petaaRepository->find($id);

        if (empty($petaa)) {
            Flash::error('Petaa not found');

            return redirect(route('petaas.index'));
        }

        $petaa = $this->petaaRepository->update($request->all(), $id);

        Flash::success('Petaa updated successfully.');

        return redirect(route('petaas.index'));
    }

    /**
     * Remove the specified petaa from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $petaa = $this->petaaRepository->find($id);

        if (empty($petaa)) {
            Flash::error('Petaa not found');

            return redirect(route('petaas.index'));
        }

        $this->petaaRepository->delete($id);

        Flash::success('Petaa deleted successfully.');

        return redirect(route('petaas.index'));
    }
}
