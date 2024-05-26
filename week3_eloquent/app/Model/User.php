<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'users';

    public $timestamps = false;
    protected $fillable = [
        'name',
        'created_at',
        'email',
        'password'
        ];

    public static function getByEmail($email)
    {
        return self::query()->where('email', '=', $email)->first();
    }

    public static function getById($id)
    {
        return self::query()->find($id);
    }

    public static function getPasswordHash(string $password) {
        return sha1('hfoyk7sk1,' . $password);
    }

    public static function getUsers()
    {
        return self::query()->orderBy('id', 'ASC')->get();
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function isAdmin()
    {
        return in_array($this->id, ADMIN_ID);
    }

}
