<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTitleeeRequest;
use App\Http\Requests\UpdateTitleeeRequest;
use App\Repositories\TitleeeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TitleeeController extends AppBaseController
{
    /** @var TitleeeRepository $titleeeRepository*/
    private $titleeeRepository;

    public function __construct(TitleeeRepository $titleeeRepo)
    {
        $this->titleeeRepository = $titleeeRepo;
    }

    /**
     * Display a listing of the Titleee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $titleees = $this->titleeeRepository->all();

        return view('titleees.index')
            ->with('titleees', $titleees);
    }

    /**
     * Show the form for creating a new Titleee.
     *
     * @return Response
     */
    public function create()
    {
        return view('titleees.create');
    }

    /**
     * Store a newly created Titleee in storage.
     *
     * @param CreateTitleeeRequest $request
     *
     * @return Response
     */
    public function store(CreateTitleeeRequest $request)
    {
        $input = $request->all();

        $titleee = $this->titleeeRepository->create($input);

        Flash::success('Titleee saved successfully.');

        return redirect(route('titleees.index'));
    }

    /**
     * Display the specified Titleee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $titleee = $this->titleeeRepository->find($id);

        if (empty($titleee)) {
            Flash::error('Titleee not found');

            return redirect(route('titleees.index'));
        }

        return view('titleees.show')->with('titleee', $titleee);
    }

    /**
     * Show the form for editing the specified Titleee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $titleee = $this->titleeeRepository->find($id);

        if (empty($titleee)) {
            Flash::error('Titleee not found');

            return redirect(route('titleees.index'));
        }

        return view('titleees.edit')->with('titleee', $titleee);
    }

    /**
     * Update the specified Titleee in storage.
     *
     * @param int $id
     * @param UpdateTitleeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTitleeeRequest $request)
    {
        $titleee = $this->titleeeRepository->find($id);

        if (empty($titleee)) {
            Flash::error('Titleee not found');

            return redirect(route('titleees.index'));
        }

        $titleee = $this->titleeeRepository->update($request->all(), $id);

        Flash::success('Titleee updated successfully.');

        return redirect(route('titleees.index'));
    }

    /**
     * Remove the specified Titleee from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $titleee = $this->titleeeRepository->find($id);

        if (empty($titleee)) {
            Flash::error('Titleee not found');

            return redirect(route('titleees.index'));
        }

        $this->titleeeRepository->delete($id);

        Flash::success('Titleee deleted successfully.');

        return redirect(route('titleees.index'));
    }
}
