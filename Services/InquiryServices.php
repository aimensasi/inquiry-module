<?php

namespace Modules\Inquiry\Services;

use Modules\Inquiry\Entities\Inquiry;

use Illuminate\Http\Request;
use App\Services\Shared\TransformerService;

class InquiryServices extends TransformerService{

  /**
   * Filter and return a collection of data
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
		$sort = $request->sort ? $request->sort : 'created_at';
		$order = $request->order ? $request->order : 'desc';
		$limit = $request->limit ? $request->limit : 10;
		$offset = $request->offset ? $request->offset : 0;
		$search = $request->search ? $request->search : '';

		$inquiries = Inquiry::where(function($query) use($search){
			$query->where('name', 'like', "%{$search}%")
				->orWhere('email', 'like', "%{$search}%");
		})->orderBy($sort, $order);

		$listCount = $inquiries->count();
		$inquiries = $inquiries->limit($limit)->offset($offset)->get();

		return response(['rows' => $this->transformCollection($inquiries), 'total' => $listCount]);
  }

  /**
   * Return the create page url.
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
    $request->validate([
			// add attributes to validate
		]);

		$inquiry = Inquiry::create([
			// add attributes to store
		]);

		return success([
			"message" => "inquiry was successfully updated."
		]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Inquiry  $inquiry
   * @return \Illuminate\Http\Response
   */
  public function show(Inquiry $inquiry){
    return respond([
			"inquiry" => $this->transform($inquiry),
		]);
  }

  /**
   * Return the edit page url
   *
   * @param  \App\Models\Inquiry  $inquiry
   * @return \Illuminate\Http\Response
   */
  public function edit(Inquiry $inquiry){
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Inquiry  $inquiry
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Inquiry $inquiry){
		$request->validate([
			// add attributes to validate
		]);


		return success([
			"message" => "inquiry was successfully updated."
		]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Inquiry  $inquiry
   * @return \Illuminate\Http\Response
   */
  public function destroy(Inquiry $inquiry){
    $inquiry->delete();

		return success([
			"message" => "Inquiry was successfully deleted."
		]);
  }


	/**
   * transfom the resource data.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
	public function transform($inquiry){
		return [
			'id' => $inquiry->id,
			'name' => $inquiry->name,
			'email' => $inquiry->email,
			'message' => $inquiry->message,
			'status' => $inquiry->status,
			'resolved_at' => date_to_human($inquiry->resolved_at),
			'sent_at' => date_to_human($inquiry->created_at),
		];
	}
}
