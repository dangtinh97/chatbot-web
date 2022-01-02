<?php

namespace App\Models;

use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject{
    protected $collection="chat_users";
    protected $fillable = [
        'full_name','is_online','online_in_browser','online_in_app','short_token','password','wait_connect',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function nameAnimal()
    {
        $string = "Con sóc
Con chó
Tinh tinh
Con bò
Sư tử
Gấu trúc
Hải mã
Rái cá
Chuột
Con chuột túi
Con dê
Con ngựa
Con khỉ
Bò
Gấu túi
Chuột chũi
Con voi
Báo
Hà mã
Hươu cao cổ
Cáo
Chó sói
Nhím
Cừu
Con nai";
        $arr = explode("\n",$string);
        return ucfirst(str_replace("Con ","",$arr[array_rand($arr)]))." ẩn danh";
    }
}

//use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens;
//
//class User extends Authenticatable
//{
//    use HasApiTokens, HasFactory, Notifiable;
//
//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array<int, string>
//     */
//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//    ];
//
//    /**
//     * The attributes that should be hidden for serialization.
//     *
//     * @var array<int, string>
//     */
//    protected $hidden = [
//        'password',
//        'remember_token',
//    ];
//
//    /**
//     * The attributes that should be cast.
//     *
//     * @var array<string, string>
//     */
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];
//}
