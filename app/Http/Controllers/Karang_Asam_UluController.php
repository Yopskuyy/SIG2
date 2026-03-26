<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKarang_Asam_UluRequest;
use App\Http\Requests\UpdateKarang_Asam_UluRequest;
use App\Repositories\Karang_Asam_UluRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Karang_Asam_UluController extends AppBaseController
{
    /** @var Karang_Asam_UluRepository $karangAsamUluRepository*/
    private $karangAsamUluRepository;

    public function __construct(Karang_Asam_UluRepository $karangAsamUluRepo)
    {
        $this->karangAsamUluRepository = $karangAsamUluRepo;
    }

    /**
     * Display a listing of the Karang_Asam_Ulu.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $karangAsamUlus = $this->karangAsamUluRepository->all();

        return view('karang__asam__ulus.index')
            ->with('karangAsamUlus', $karangAsamUlus);
    }

    /**
     * Show the form for creating a new Karang_Asam_Ulu.
     *
     * @return Response
     */
    public function create()
    {
        return view('karang__asam__ulus.create');
    }

    /**
     * Store a newly created Karang_Asam_Ulu in storage.
     *
     * @param CreateKarang_Asam_UluRequest $request
     *
     * @return Response
     */
    public function store(CreateKarang_Asam_UluRequest $request)
    {
        $input = $request->all();

        $karangAsamUlu = $this->karangAsamUluRepository->create($input);

        Flash::success('Karang  Asam  Ulu saved successfully.');

        return redirect(route('karangAsamUlus.index'));
    }

    /**
     * Display the specified Karang_Asam_Ulu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $karangAsamUlu = $this->karangAsamUluRepository->find($id);

        if (empty($karangAsamUlu)) {
            Flash::error('Karang  Asam  Ulu not found');

            return redirect(route('karangAsamUlus.index'));
        }

        return view('karang__asam__ulus.show')->with('karangAsamUlu', $karangAsamUlu);
    }

    /**
     * Show the form for editing the specified Karang_Asam_Ulu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $karangAsamUlu = $this->karangAsamUluRepository->find($id);

        if (empty($karangAsamUlu)) {
            Flash::error('Karang  Asam  Ulu not found');

            return redirect(route('karangAsamUlus.index'));
        }

        return view('karang__asam__ulus.edit')->with('karangAsamUlu', $karangAsamUlu);
    }

    /**
     * Update the specified Karang_Asam_Ulu in storage.
     *
     * @param int $id
     * @param UpdateKarang_Asam_UluRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKarang_Asam_UluRequest $request)
    {
        $karangAsamUlu = $this->karangAsamUluRepository->find($id);

        if (empty($karangAsamUlu)) {
            Flash::error('Karang  Asam  Ulu not found');

            return redirect(route('karangAsamUlus.index'));
        }

        $karangAsamUlu = $this->karangAsamUluRepository->update($request->all(), $id);

        Flash::success('Karang  Asam  Ulu updated successfully.');

        return redirect(route('karangAsamUlus.index'));
    }

    /**
     * Remove the specified Karang_Asam_Ulu from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $karangAsamUlu = $this->karangAsamUluRepository->find($id);

        if (empty($karangAsamUlu)) {
            Flash::error('Karang  Asam  Ulu not found');

            return redirect(route('karangAsamUlus.index'));
        }

        $this->karangAsamUluRepository->delete($id);

        Flash::success('Karang  Asam  Ulu deleted successfully.');

        return redirect(route('karangAsamUlus.index'));
    }
}
