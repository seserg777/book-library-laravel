<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>>
     */
    public function rules(): array
    {
        $rules = StoreBookRequest::bookRules();
        $patchRules = [];
        foreach ($rules as $key => $ruleSet) {
            $patchRules[$key] = array_merge(
                ['sometimes'],
                $ruleSet
            );
        }

        return $patchRules;
    }
}
