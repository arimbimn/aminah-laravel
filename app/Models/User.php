<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function lender()
    {
        return $this->belongsTo(Lender::class, 'email', 'email');
    }

    public function borrower()
    {
        return $this->hasMany(Borrower::class, 'email', 'email');
    }

    public function latestBorrower()
    {
        return $this->hasOne(Borrower::class, 'email', 'email')->latest();
    }

    public function checkProfile()
    {
        return $this->hasOne(Lender::class, 'email', 'email')
            ->where('name', '!=', null)
            ->where('jenis_kelamin', '!=', null)
            ->where('tempat_lahir', '!=', null)
            ->where('tanggal_lahir', '!=', null)
            ->where('hp_number', '!=', null)
            ->where('nik', '!=', null)
            ->where('address', '!=', null);
    }

    public function checkTransaction()
    {
        return $this->hasMany(Transaction::class)
            ->where('status', 'waiting');
    }

    public function checkIncome()
    {
        return $this->hasMany(Transaction::class)
            ->where('status', 'accepted')
            ->whereIn('transaction_type', ['1', '2']);
    }

    public function checkExpense()
    {
        return $this->hasMany(Transaction::class)
            ->where('status', 'accepted')
            ->whereIn('transaction_type', [3]);
    }

    public function sumAmount()
    {
        return $this->checkIncome->sum('transaction_amount') - $this->checkExpense->sum('transaction_amount');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function scopeAdmin($query)
    {
        $query->where('role', 'admin');
    }

    public function scopeLender($query)
    {
        $query->where('role', 'lender');
    }

    public function scopeBorrower($query)
    {
        $query->where('role', 'borrower');
    }
}
