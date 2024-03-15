<?php

namespace App\Models;

use Egulias\EmailValidator\Parser\Comment;
use Faker\Provider\cs_CZ\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    protected $primaryKey="id";
    protected $keyType="int";
    protected $table="contacts";
    public $incrementing =true;
    public $timestamps =true;
    protected $fillable = ['first_name','last_name','email','phone'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
        //return $this->belongsTo(User::class); //
    }
    
    public function address(): HasMany
        {
        return $this->hasMany(Address::class, 'contact_id','id');
        }
    
}
