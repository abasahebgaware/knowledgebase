<?php

class Post extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'post';
	protected $primaryKey = "p_id";


	public function comment()
    {
        return $this->hasMany('Comment','p_id');
    }

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
