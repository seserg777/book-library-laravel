<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    // No authorization yet.
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    // Partial update: sometimes + each base rule.
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
