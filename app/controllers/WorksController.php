<?php

class WorksController extends \BaseController {

	/**
	 * Display a listing of works
	 *
	 * @return Response
	 */
	public function index()
	{
		$works = Work::orderBy('enddate','asc')->get();

		return View::make('works.index', compact('works'));
	}

	/**
	 * Show the form for creating a new work
	 *
	 * @return Response
	 */
	public function create()
	{
		$members = Member::lists('name','id');
		return View::make('works.create',compact('members'));
	}

	/**
	 * Store a newly created work in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Work::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Work::create($data);

		return Redirect::route('works.index');
	}

	/**
	 * Display the specified work.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$work = Work::findOrFail($id);

		return View::make('works.show', compact('work'));
	}

	/**
	 * Show the form for editing the specified work.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$work = Work::find($id);

		$members = Member::lists('name','id');

		return View::make('works.edit', compact('work','members'));
	}

	/**
	 * Update the specified work in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$work = Work::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Work::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$work->update($data);

		return Redirect::route('works.index');
	}

	/**
	 * Remove the specified work from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Work::destroy($id);

		return Redirect::route('works.index');
	}

}
