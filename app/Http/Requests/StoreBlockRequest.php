<?php

namespace App\Http\Requests;

use App\Models\BlockType;
use App\Rules\INNRule;
use App\Rules\OGRNControlSumRule;
use App\Rules\OGRNRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBlockRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return match(intval($this->type)) {
			BlockType::Text->value => [
				'name' => 'required',
			],
			// TODO Реализовать поддержку других типов блоков
		};
	}

	public function attributes()
	{
		return match(intval($this->type)) {
			BlockType::Text->value => [
				'name' => 'Название блока',
			],
			// TODO Реализовать поддержку других типов блоков
		};
	}
}