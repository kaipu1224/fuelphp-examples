<?php

/**
 * Upload sample
 */
class Controller_Upload extends Controller_Template
{
	public function action_index()
	{
    $images = array();
    foreach(File::read_dir(DOCROOT.'uploads\\') as $img){
      array_push($images,mb_convert_encoding($img,"UTF-8","SJIS-win"));
    }

    $this->template->set_global('images', $images);
		$this->template->title = 'Uploads';
		$this->template->content = View::forge('upload/index');
	}

  public function post_upload(){
    Upload::process(array('path' => Config::get('upload.path')));
    if (Upload::is_valid()) {
      Upload::save();
      Session::set_flash('success', 'アップロード成功：');
    }else{
      Session::set_flash('error', 'ファイルアップロードに失敗');
    }

    $data = array();
    $view = View::forge('upload/index',$data);
    $images = array();
    foreach(File::read_dir(DOCROOT.'uploads\\') as $img){
      array_push($images,mb_convert_encoding($img,"UTF-8","SJIS-win"));
    }
    $this->template->set_global('images', $images);
    $this->template->title = "Uploads";
    $this->template->content = View::forge('upload/index', $data);
  }
}
