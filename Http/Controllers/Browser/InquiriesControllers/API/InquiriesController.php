<?php

namespace Modules\Inquiry\Http\Controllers\Browser\InquiriesControllers\API;

use Modules\Inquiry\Entities\Inquiry;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Inquiry\Services\InquiryServices;

class InquiriesController extends Controller{

	protected $sInquiry;

	public function __construct(InquiryServices $sInquiry){
		$this->sInquiry = $sInquiry;
	}


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
    return $this->sInquiry->index($request);
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
		return $this->sInquiry->show($inquiry);
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
    return $this->sInquiry->delete($inquiry);
  }
}
