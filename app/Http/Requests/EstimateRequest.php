<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstimateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $booleans = [
            'isEgyptBased', 'themeLight', 'themeMedium', 'themeHeavy', 'customSections', 'animations',
            'multicurrency', 'translation', 'subscriptions', 'paymobSetup', 'paytabsSetup', 'shippingZones',
            'seo', 'pixelGa4', 'perfOpt', 'accessibility', 'qaAudit', 'blogSetup', 'integrationKlaviyo',
            'integrationMailchimp', 'whatsappChat', 'filterSearch', 'rushDelivery', 'maintenance'
        ];

        $rules = [
            'tier' => 'required|in:starter,pro',
            'isEgyptBased' => 'required|boolean',
            'pages' => 'required|integer|min:1|max:50',
            'currency' => 'required|in:USD,EUR,EGP',
        ];

        foreach ($booleans as $flag) {
            $rules[$flag] = 'required|boolean';
        }

        return $rules;
    }
}
