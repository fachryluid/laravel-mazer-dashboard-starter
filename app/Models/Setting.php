<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public function getAuthBgUrlAttribute()
    {
        return asset($this->auth_bg ? 'storage/settings/' . $this->auth_bg : 'images/default/auth-bg.jpg');
    }

    public function getReportLogoPathAttribute()
    {
        return $this->report_logo ? public_path('storage/settings/' . $this->report_logo) : public_path('images/default/jejakode.png');
    }

    public function getAppLogoUrlAttribute()
    {
        return asset($this->app_logo ? 'storage/settings/' . $this->app_logo : 'images/default/jejakode.svg');
    }
}
