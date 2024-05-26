<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $table = 'messages';
    public $timestamps = false;
    protected $fillable = [
        'text',
        'created_at',
        'author_id',
        'image'
    ];

    public static function deleteMessage(int $messageId)
    {
        self::destroy($messageId);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public static function getMessages()
    {

        return self::with('author')->limit(20)->orderBy('id', 'ASC')
            ->offset(self::count()-20)
            ->get();
    }

    public static function getUserMessages($userId)
    {
        return self::query()->where('author_id', '=', $userId)->limit(20)
            ->orderBy('id', 'ASC')
            ->offset(self::count()-20)
            ->get();
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor(User $author)
    {
        $this->author = $author;
    }

    public function loadFile($file)
    {
        if (file_exists($file))
        {
            $this->image = $this->createFileName();
            move_uploaded_file($file, getcwd() . '/images/' . $this->image);
        }
    }

    private function createFileName()
    {
        return sha1(microtime(1) . mt_rand(0,99999999) . '.jpg');
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    public function getData()
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'created_at' => $this->createdAt,
            'author_id' => $this->authorId,
            'image' => $this->image
        ];
    }

}
