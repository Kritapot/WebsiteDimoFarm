<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public function portfolio_category()
    {
        return $this->belongsTo(PortfolioCategory::class, 'cat_id');
    }

    public function getTitleAttribute($value)
    {
        return !empty($value) ? $value : "ไม่มีหัวข้อ";
    }
}
