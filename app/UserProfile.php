<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class UserProfile extends Model
{
     protected $fillable = [
       'photo','mobile','phone','address_1','address_2','zipcode','pan_number','management_level','join_date','attach','google','facebook','website','skype','linkedin','twitter','gender','dob','hobby','city','state','country',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function setattachAttribute($file) {
        $source_path = upload_tmp_path($file);
        if ($file && file_exists($source_path)) 
        {
            upload_move($file,'attach');
            Image::make($source_path)->resize(946,470)->save($source_path);
            upload_move($file,'attach','front');
            Image::make($source_path)->resize(708, 464)->save($source_path);
            upload_move($file,'attach','medium');
            Image::make($source_path)->resize(58, 58)->save($source_path);
            upload_move($file,'attach','thumb');
            //@unlink($source_path);
            //$this->studentDeleteFile();
        }
        $this->attributes['attach'] = $file;
        if ($file == '') 
        {
            //$this->studentDeleteFile();
            $this->attributes['attach'] = "";
        }
    }

    public function attach_url($type='original') 
    {
        if (!empty($this->attach))
            return upload_url($this->attach,'attach',$type);
        elseif (!empty($this->attach) && file_exists(tmp_path($this->attach)))
            return tmp_url($this->$attach);
        else
            return asset('images/default-blog.jpg');
    }

    public function setPhotoAttribute($file) {
        $source_path = upload_tmp_path($file);

        if ($file && file_exists($source_path)) 
        {
            upload_move($file,'photo');
            Image::make($source_path)->resize(400,200)->save($source_path);
            upload_move($file,'photo','front');
            Image::make($source_path)->resize(50,50)->save($source_path);
            upload_move($file,'photo','thumb');
            //@unlink($source_path);
    //$this->deleteFile();
        }
        $this->attributes['photo'] = $file;
        if ($file == '') 
        {
    //$this->deleteFile();
            $this->attributes['photo'] = "";
        }
    }
    public function photo_url($type='original') 
    {
        if (!empty($this->photo))
            return upload_url($this->photo,'photo',$type);
        elseif (!empty($this->photo) && file_exists(tmp_path($this->photo)))
            return tmp_url($this->$photo);
        else
            return asset('images/default.png');
    }

}
