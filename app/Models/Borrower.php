<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrower extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'borrowers';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    // cari data borrower denagn status pending
    public function scopePending($query)
    {
        $query->where('status', 'Pending');
    }

    // cari data borrower dengan status accepted
    public function scopeAccepted($query)
    {
        $query->where('status', 'Accepted');
    }

    // cari data borrower dengan status rejected
    public function scopeRejected($query)
    {
        $query->where('status', 'rejected');
    }
}
