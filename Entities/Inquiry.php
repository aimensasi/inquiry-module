<?php

namespace Modules\Inquiry\Entities;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model{

	/**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
		'name', 'email', 'message', 'subject', 'status', 'member_id', 'is_member', 'resolved_at'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
		// attributes
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
		'is_member' => 'boolean',
		'resolved_at' => 'dateTime',
  ];
}
