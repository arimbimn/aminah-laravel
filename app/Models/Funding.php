<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funding extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'fundings';

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

    public function borrower()
    {
        return $this->belongsTo(Borrower::class, 'borrower_id', 'id');
    }

    public function fundinglenders()
    {
        return $this->hasMany(FundingLender::class, 'funding_id');
    }

    public function scopeActive($query)
    {
        $query->where('status', 'Active');
    }

    public function scopeInactive($query)
    {
        $query->where('status', 'Inactive');
    }

    public function scopeUnfinished($query)
    {
        $query->where('is_finished', '0');
    }
}
