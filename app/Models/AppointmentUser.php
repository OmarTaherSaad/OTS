<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AppointmentUser extends Pivot
{
    protected $fillable = [
        'invoice_data', 'paid'
    ];

    public function appointment()
    {
        return $this->belongsTo(\App\Models\Appointment::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function getEntranceCard()
    {
        return $this->file();
    }

    public function getQR()
    {
        try {
            $svgImage = QrCode::size("250")->eye("circle")->generate(route('helpdesk.entrance-card-enter', ['appointmentUser' => $this]));
        } catch (\Throwable $th) {
            return $this->id;
        }
        $svgImage = str_replace('<?xml version="1.0" encoding="UTF-8"?>', "", $svgImage);
        return $svgImage;
    }

    public function file()
    {
        $pdf = PDF::loadView('exports.appointment-entrance-card', ['AppointUser' => $this, 'appointment' => $this->appointment]);
        return $pdf->stream('entrance-card.pdf');
    }

    public function fileContent()
    {
        $pdf = PDF::loadView('exports.appointment-entrance-card', ['AppointUser' => $this, 'appointment' => $this->appointment]);
        return $pdf->output();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($au) {
            $au->{$au->getKeyName()} = (string) \Str::uuid();
        });
    }
}
