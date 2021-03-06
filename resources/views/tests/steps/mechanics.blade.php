@extends('tests.steps.wizard')

@section('service')Создание теста@endsection

@section('interior.subheader') @endsection

@section('form.fields')
	@php
        $heap = session('heap');
        $options = intval($heap['options']);
        if (isset($heap) && isset($heap['step-mechanics'])) {
            $fields = [
				['name' => 'set_id', 'title' => 'Набор вопросов', 'required' => false, 'type' => 'select', 'options' => $sets, 'value' => $heap['set_id']],
				['title' => 'Дополнительные механики нейротеста', 'type' => 'heading'],
				['name' => 'eye', 'title' => 'Eye-tracking (отслеживание движения зрачков глаз)', 'required' => false, 'type' => 'checkbox', 'value' => $options & \App\Models\TestOptions::EYE_TRACKING->value],
				['name' => 'mouse', 'title' => 'Mouse-tracking (отслеживание движения курсора мыши)', 'required' => false, 'type' => 'checkbox', 'value' => $options & \App\Models\TestOptions::MOUSE_TRACKING->value],
				['name' => 'mode', 'type' => 'hidden', 'value' => $mode],
				['name' => 'test', 'type' => 'hidden', 'value' => $test],
				['name' => 'sid', 'type' => 'hidden', 'value' => $sid],
			];
        } else {
			$fields = [
				['name' => 'set_id', 'title' => 'Набор вопросов', 'required' => false, 'type' => 'select', 'options' => $sets],
				['title' => 'Дополнительные механики нейротеста', 'type' => 'heading'],
				['name' => 'eye', 'title' => 'Eye-tracking (отслеживание движения зрачков глаз)', 'required' => false, 'type' => 'checkbox'],
				['name' => 'mouse', 'title' => 'Mouse-tracking (отслеживание движения курсора мыши)', 'required' => false, 'type' => 'checkbox'],
				['name' => 'mode', 'type' => 'hidden', 'value' => $mode],
				['name' => 'test', 'type' => 'hidden', 'value' => $test],
				['name' => 'sid', 'type' => 'hidden', 'value' => $sid],
			];
        }
	@endphp
@endsection

