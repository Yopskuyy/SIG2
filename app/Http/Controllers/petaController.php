<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepetaRequest;
use App\Http\Requests\UpdatepetaRequest;
use App\Repositories\petaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class petaController extends AppBaseController
{
    /** @var petaRepository $petaRepository*/
    private $petaRepository;

    public function __construct(petaRepository $petaRepo)
    {
        $this->petaRepository = $petaRepo;
    }

    /**
     * Display a listing of the peta.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $petas = $this->petaRepository->all();

        return view('petas.index')
            ->with('petas', $petas);
    }

    /**
     * Show the form for creating a new peta.
     *
     * @return Response
     */
    public function create()
    {
        return view('petas.create');
    }

    /**
     * Store a newly created peta in storage.
     *
     * @param CreatepetaRequest $request
     *
     * @return Response
     */
    public function store(CreatepetaRequest $request)
    {
        $input = $request->all();

        $peta = $this->petaRepository->create($input);

        Flash::success('Peta saved successfully.');

        return redirect(route('petas.index'));
    }

    /**
     * Display the specified peta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $peta = $this->petaRepository->find($id);

        if (empty($peta)) {
            Flash::error('Peta not found');

            return redirect(route('petas.index'));
        }

        return view('petas.show')->with('peta', $peta);
    }

    /**
     * Show the form for editing the specified peta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $peta = $this->petaRepository->find($id);

        if (empty($peta)) {
            Flash::error('Peta not found');

            return redirect(route('petas.index'));
        }

        return view('petas.edit')->with('peta', $peta);
    }

    /**
     * Update the specified peta in storage.
     *
     * @param int $id
     * @param UpdatepetaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepetaRequest $request)
    {
        $peta = $this->petaRepository->find($id);

        if (empty($peta)) {
            Flash::error('Peta not found');

            return redirect(route('petas.index'));
        }

        $peta = $this->petaRepository->update($request->all(), $id);

        Flash::success('Peta updated successfully.');

        return redirect(route('petas.index'));
    }

    /**
     * Remove the specified peta from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $peta = $this->petaRepository->find($id);

        if (empty($peta)) {
            Flash::error('Peta not found');

            return redirect(route('petas.index'));
        }

        $this->petaRepository->delete($id);

        Flash::success('Peta deleted successfully.');

        return redirect(route('petas.index'));
    }
}
