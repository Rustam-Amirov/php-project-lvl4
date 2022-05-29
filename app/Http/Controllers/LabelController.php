<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Validator;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('labels.index')->with('labels', Label::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $this->authorize('create', Label::class);
        } catch (AuthorizationException $e) {
            flash(__('auth.auth_check'))->error();
            return redirect(route('labels.index'));
        }

        return view('labels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->authorize('create', Label::class);
        } catch (AuthorizationException $e) {
            flash(__('auth.auth_check'))->error();
            return redirect(route('labels.index'));
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'min:1'],
            'description' => ['max:255'],
        ], [
            'required' => __('label.required')
        ]);
        $validator->validate();


        Label::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        flash(__('label.create'))->success();
        return redirect(route('labels.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function show(Label $label)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function edit(Label $label)
    {
        try {
            $this->authorize('update', $label);
        } catch (AuthorizationException $e) {
            flash(__('auth.auth_check'))->error();
            return redirect(route('labels.index'));
        }

        return view('labels.edit', ['label' => $label]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Label $label)
    {
        try {
            $this->authorize('update', $label);
        } catch (AuthorizationException $e) {
            flash(__('auth.auth_check'))->error();
            return redirect(route('labels.index'));
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'min:1'],
            'description' => ['max:255'],
        ], [
            'required' => __('label.required')
        ]);
        $validator->validate();

        $label->name = $request->name;
        $label->description = $request->description;
        $label->update();

        flash(__('label.update'))->success();
        return redirect(route('labels.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy(Label $label)
    {
        try {
            $this->authorize('delete', $label);
        } catch (AuthorizationException $e) {
            flash(__('label.delete_wrong'))->error();
            return redirect(route('labels.index'));
        }

        $label->delete();
        flash(__('label.delete'))->success();
        return redirect(route('labels.index'));
    }
}
