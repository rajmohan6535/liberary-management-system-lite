<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Lend extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'book_id',
        'fine',
        'paid',
        'status',
        'due_date'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * @return string
     */
    public function statusText($html = false)
    {

        switch ($this->status) {
            case 0 :
                return "Lost";
            case 1:
                if ($this->isOverDue())
                    return "Overdue";
                else
                    return "Lend";
            case 2:
                return "returned";
            default:
                return "";
        }
    }

    /**
     * @return bool
     */
    public function isOverDue()
    {
        return !Carbon::parse($this->due_date)->isFuture();
    }

    public function getStatusHtml()
    {
        switch ($this->status) {
            case 0 :
                return "<span class='badge badge-danger'>LOST</span>";
            case 1:
                if ($this->isOverDue())
                    return "<span class='badge badge-warning'>Overdue</span>";
                else
                    return "<span class='badge badge-info'>Lend</span>";
            case 2:
                return "<span class='badge badge-success'>Returned</span>";
            default:
                return "";
        }
    }

    public function calculateFine()
    {
        $days = Carbon::parse($this->due_date)->diffInDays() ?? 1;

        return round(($this->lend_cost * .5) * $days, 2);
    }
}
