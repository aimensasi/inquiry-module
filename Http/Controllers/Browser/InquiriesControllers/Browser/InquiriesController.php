<?php

namespace Modules\Inquiry\Http\Controllers\Browser\InquiriesControllers\Browser;

use Modules\Inquiry\Entities\Inquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InquiriesController extends Controller{

	/**
	* The path to the "view" folder of this controller
	*
	* @var string
	*/
	public const PATH = 'inquiry::';


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){
    return view(self::PATH . 'index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(){
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request){
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Inquiry  $inquiry
   * @return \Illuminate\Http\Response
   */
  public function show(Inquiry $inquiry){
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Inquiry  $inquiry
   * @return \Illuminate\Http\Response
   */
  public function edit(Inquiry $inquiry){
    return view(self::PATH . 'edit', ['id' => $inquiry->id]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Inquiry  $inquiry
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Inquiry $inquiry){
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Inquiry  $inquiry
   * @return \Illuminate\Http\Response
   */
  public function destroy(Inquiry $inquiry){
    //
  }
}
